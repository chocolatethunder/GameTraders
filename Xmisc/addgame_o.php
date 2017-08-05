<?php
session_start();

require_once("includes/functions.php");
require_once("includes/connection.php");

if (isset($_POST['submit'])) {
	
	//check if the form has a valid session id if not send them back to the empty form
	if ($_POST['tokenid'] !== $_SESSION['tokenid']) {  
		 goto("addgame.php");  
	} else {
		
		// if submit is set
		if (isset($_POST['submit'])) {
					
					// if there was something available in the title
					if (isset($_POST['name_of_the_game']) && $_POST['name_of_the_game'] != "" ){
						
						$nameofgame = $_POST['name_of_the_game'];
						
						// if pretty sure is NOT checked AND Session var of all good is not the same as the current game title
						if ( !isset($_POST['pretty_sure']) && $_SESSION['allgood'] != $nameofgame) {
							
							// explode the names
							$exploded_keywords = explode(" ", trim($nameofgame));
							$total_keywords = count($exploded_keywords)-1;
							
							// start making the search query
							$sql_search_query = "SELECT * FROM games WHERE game_name like ";
										
										// loop here
										
										foreach ($exploded_keywords as $keyword) {									
												$kw++;
												$sql_search_query .= "'%".$keyword."%' ";
												
												if ($kw <= $total_keywords) {
													$sql_search_query .= "OR game_name like ";
												}
												
										}
								
							// end making the search query 
							$sql_search_query .=";";
							
							// process the search query
							$gamecheck = mysql_query($sql_search_query) or die ("Error connecting to database");
							$numba = mysql_num_rows($gamecheck);									
									
									// if the search query comes back with results then show the user suggestions
									if (isset($numba) && $numba > 0) {
										
										$err_msg .= "We may have your game:<br />";
								
										$err_msg .= "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style =\"margin-top:5px;\">
														<tr>
														  <td><img src=\"images/err_c_topleft.png\" width=\"4\" height=\"4\" /></td>
														  <td width=\"100%\" bgcolor=\"#fbc580\"></td>
														  <td><img src=\"images/err_c_topright.png\" width=\"4\" height=\"4\" /></td>
														</tr>
														<tr>
														  <td bgcolor=\"#fbc580\">&nbsp;</td>
														  <td bgcolor=\"#fbc580\">";
														  
										$err_msg .= "<div style = \"float:right;\"><input type=\"checkbox\" name=\"pretty_sure\" value=\"1\" />&nbsp;No, I am 100% positive this is genuine!&nbsp;</div>";	
										
										// loop to display all the search results
										for ($l=1; $l <= $numba; $l++) {										
											$getgameid = mysql_fetch_array($gamecheck);
											$err_msg .= "&nbsp;<a href = \"game.php?gameid=".$getgameid['id']."\" style=\"color:#900900\" target=\"_blank\" >".$getgameid['game_name']."</a><br />";
											
										}
										
										$err_msg .= "</td>
											<td bgcolor=\"#fbc580\">&nbsp;</td>
										  </tr>
										  <tr>
											<td><img src=\"images/err_c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
											<td bgcolor=\"#fbc580\"></td>
											<td><img src=\"images/err_c_bottomright.png\" width=\"4\" height=\"4\" /></td>
										  </tr>
										</table><br />";
										
										// set this session var so that above query doesn't happen again IF this session var remains the same AND pretty_sure IS CHECKED. 
										if (isset($_POST['pretty_sure']) ) {
											$_SESSION['allgood'] = $nameofgame;	
										}
										
										$suggestion_var = 1;
									
							}					
						}
						
					} else {
						// if there is no imput in the title then echo error message
						$err_msg .= "<b>Error:</b> Please enter an appropriate game title <br/>";
						$err_title = 1;
					}
					
					// check if image url exists
					if (isset($_POST['image_url']) && $_POST['image_url'] != "" ){
						$imageurl = $_POST['image_url'];
					} else {
						$err_msg .= "<b>Error:</b> Please enter an image URL <br/>";
						$err_img = 1;
					}
					
					//check if video url exists but don't display error since it is not mandatory
					if (isset($_POST['video_url']) && $_POST['video_url'] != "" ){
						$videourl = $_POST['video_url'];
					}
					
					// check if esrbrating exists 
					if (isset($_POST['esrbrating']) && $_POST['esrbrating'] != "" ){
						$esrbrating = $_POST['esrbrating'];
					} else {
						$err_msg .= "<b>Error:</b> Please enter an ESRB Rating <br/>";
						$err_esrb = 1;
					}
					
					//check if consoles exists. Check this first so that you can store which ones were checked into memory.
					if (isset($_POST['console']) && $_POST['console'] != "") {
						$console = implode($_POST['console'],",");
					} else {
						$err_msg .="<b>Error:</b> Select the appropriate console(s) for the game <br/>";
						$err_console = 1;
					}
	
					
					// if all the values are in place and have been cleaned			
					if (isset($nameofgame) && isset($imageurl) && isset($esrbrating) && isset($console) ) {
						
						// then prepare a query to be executed
						$query="INSERT INTO games(game_name,image_url,trailer_url,esrb,consoles) VALUES('".$nameofgame."','".$imageurl."','".$videourl."','".$esrbrating."','".$console."');";
						
						// clean the name of any special characters
						$clean_name = str_replace(":","",$nameofgame);						
						
						// check if the entered name is actually unique or whether the user is messing with the database
						$check_query = mysql_query("SELECT * FROM games WHERE game_name = '".$clean_name."';") or die ("Error connecting to database");
						$check_rows = mysql_num_rows($check_query);
						
						// if the user has been shows the suggestions OR the check query brings back results OR make sure pretty_sure IS CHECKED
						if ($suggestion_var == 1 || $check_rows > 0 ) {
								
								// check if its just $suggestion_Var being gay or is it actually returning some results because it will display an empty table if there is nothing
								if ($check_rows > 0 ) {
								
									$catch_data = mysql_fetch_array($check_query);
									
									$err_msg .= "<b>Error:</b> Your game already exists.<br/>
												<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style =\"margin-top:5px;\">
														  <tr>
															<td><img src=\"images/err_c_topleft.png\" width=\"4\" height=\"4\" /></td>
															<td width=\"100%\" bgcolor=\"#fbc580\"></td>
															<td><img src=\"images/err_c_topright.png\" width=\"4\" height=\"4\" /></td>
														  </tr>
														  <tr>
															<td bgcolor=\"#fbc580\">&nbsp;</td>
															<td bgcolor=\"#fbc580\">
									
																&nbsp;<a href = \"game.php?gameid=".$catch_data['id']."\" style=\"color:#900900\" target=\"_blank\" >".$catch_data['game_name']."</a>
												
															</td>
														<td bgcolor=\"#fbc580\">&nbsp;</td>
													  </tr>
													  <tr>
														<td><img src=\"images/err_c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
														<td bgcolor=\"#fbc580\"></td>
														<td><img src=\"images/err_c_bottomright.png\" width=\"4\" height=\"4\" /></td>
													  </tr>
													</table><br />";
								}
							
						} else {						
							
							// process the query
							if (mysql_query($query)){
								
								$query2="SELECT id FROM games WHERE game_name = '".$nameofgame."';";
								
								if (mysql_query($query2)){
									
									$game_id = mysql_fetch_array(mysql_query($query2));
									
									mysql_query("INSERT INTO polls(gameID,lik) VALUES(".$game_id['id'].",1);");
									
									$success = 1;
									unset($_SESSION['allgood']);
									unset($suggestion_var);
									
								} else {
									
									$error = "We have an error";
								}
							} else {
								
								$error = "We have an error";
							}
						}
					}
		}	
	}
}

////////////////////////////////////////////   ||||||||
////////////////////////////////////////////    ||||||
////////////////////////////////////////////     ||||
echo mysql_error();/////////////////////////
////////////////////////////////////////////      ||

include("includes/header.php");

if (isset($success)){
	 echo "<table cellpadding=\"5\">
	 			<tr>
					<td><img src=\"images/messages/gameadded.png\" border = \"0\" /></td>
					<td>&nbsp;</td>
					<td align=\"center\"><div class=\"messages\">Succcess! Game has been added to the database!</div><br><br>
						<div class=\"messages2\">You can now go to the <a href=\"list.php\">list</a> and find your game in there or you can just <a href=\"game.php?gameid=".$game_id['id']."\">click here</a> to go directly to its information page!</div></td>
				<tr>
			</table>";  
	  unset($success);
	} else {
	
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Add a game!</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table><br />

<!--The image of the front cover and ESRB rating of the game can be <a href=\"javascript:lookfor()\">found on its Wikipedia page.</a> Simply copy and paste the url of the image and select the ESRB rating and then you will be done! <br /><br /> The Youtube page will bring up appropriate trailers for your game. Choose a link and paste it here.
-->

<table cellpadding="0" cellspacing="2" border="0" style="float:right">
	<tr>
      <td>
      <?php table_hints ("Add a game using its proper name without getting too creative.");  ?>
      </td>
    </tr>    
    <tr><td></td></tr>   
    <tr>
      <td>
      <?php table_hints ("<a href=\"javascript:lookforboth()\">HELP ME FIND MY GAME'S INFORMATION</a><br /><br />
														   Choose the appropriate image link and paste it in the Boxart image URL field.<br />
														   Select the appropriate ESRB rating.<br />
														   Choose the appropriate Youtube link and paste it in the Trailer URL field.");  ?>
      </td>
    </tr>               
    <tr><td>&nbsp;</td></tr>  
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
      <td>
      <?php table_hints ("You may not know all the Trade-in values which is perfectly ok. Just fill in the trade-in value(s) that you currently have for the corresponding console. If you don't have ANY Trade in values that is perfectly ok as well. Just add the game.");  ?>
      </td>
    </tr>    
</table>   

    <form method="post" action="addgame.php" style="float:left; margin-left:5px;" name="addgame">
    
        <div id="errorlnk" class="errortext">
        <?php
        // Display errors here!
		   if(isset($err_msg)){
				echo $err_msg."<br/>";
			}
        ?>
        </div>
    
        <table border="0" cellpadding="3" style="margin-left:-5px;">
          <tr>
            <td width="150"><span class="title">Title:</span><span class="aster">*</span></td>
            <td><input name="name_of_the_game" value="<?php if (isset($_POST['name_of_the_game'])) { echo $_POST['name_of_the_game']; } ?>" type="text" size="35" id="gametitle" /></td>
			<td><?php if (isset($err_title)) {error();}	?></td> 

          </tr>
          <tr><td></td><td></td><td></td></tr>
          <tr>
            <td><span class="title">Boxart image URL:</span><span class="aster">*</span></td>
            <td><input name="image_url" value="<?php if (isset($_POST['image_url'])) { echo $_POST['image_url']; } ?>" type="text" size="35" /></td>
			<td><?php if (isset($err_img)) {error();}	?></div></td>

          </tr>
          <tr><td></td><td></td><td></td></tr>
          <tr>
          	<td><span class="title">ESRB rating:</span><span class="aster">*</span></td>
            <td>
            <select name="esrbrating">
                <option value="">Please select a Rating</option>
                <option value="1" <?php if(isset($_POST['esrbrating']) && $_POST['esrbrating'] == 1) { echo "selected"; } ?> >Early Childhood</option>
                <option value="2" <?php if(isset($_POST['esrbrating']) && $_POST['esrbrating'] == 2) { echo "selected"; } ?> >Everyone</option>
                <option value="3" <?php if(isset($_POST['esrbrating']) && $_POST['esrbrating'] == 3) { echo "selected"; } ?> >Everyone 10+</option>
                <option value="4" <?php if(isset($_POST['esrbrating']) && $_POST['esrbrating'] == 4) { echo "selected"; } ?> >Teen</option>
                <option value="5" <?php if(isset($_POST['esrbrating']) && $_POST['esrbrating'] == 5) { echo "selected"; } ?> >Mature 17+</option>
                <option value="6" <?php if(isset($_POST['esrbrating']) && $_POST['esrbrating'] == 6) { echo "selected"; } ?> >Adult</option>
                <option value="7" <?php if(isset($_POST['esrbrating']) && $_POST['esrbrating'] == 7) { echo "selected"; } ?> >Rating Pending</option>
            </select>
            </td>
            <td><?php if (isset($err_esrb)) {error();}	?></td>
          </tr>
         <tr><td></td><td></td><td></td></tr>
         <tr>
			<td><span class="title">Trailer URL:</span></td>
            <td><input name="video_url" value="<?php if (isset($_POST['video_url'])) { echo $_POST['video_url']; } ?>" type="text" size="35" /></td>
            <td></td>
        </tr>
        <tr><td></td><td></td><td></td></tr>
        <tr>
        	<td colspan="2">
            	<span class="title">Platform Availability:</span><span class="aster">*</span><br /><br />
                <input type="checkbox" name="console[]" id="check_1" value="1" <?php if($console[0] == 1) { echo "checked=\"checked\""; } ?> onclick="showMe('pctiv')" />PC&nbsp;
                <input type="checkbox" name="console[]" id="check_2" value="2" <?php if($console[2] == 2) { echo "checked=\"checked\""; } ?> onclick="showMe('xbox360tiv')" />XBOX360&nbsp;
                <input type="checkbox" name="console[]" id="check_3" value="3" <?php if($console[4] == 3) { echo "checked=\"checked\""; } ?> onclick="showMe('ps3tiv')"  />PS3&nbsp;
                <input type="checkbox" name="console[]" id="check_4" value="4" <?php if($console[6] == 4) { echo "checked=\"checked\""; } ?> onclick="showMe('wiitiv')" />Wii&nbsp;
                <input type="checkbox" name="console[]" id="check_5" value="5" <?php if($console[8] == 5) { echo "checked=\"checked\""; } ?>  onclick="showMe('xboxtiv')" />XBOX&nbsp;
                <input type="checkbox" name="console[]" id="check_6" value="6" <?php if($console[10] == 6) { echo "checked=\"checked\""; } ?>  onclick="showMe('ps2tiv')" />PS2&nbsp;
                <br /><br />
                <input type="checkbox" name="console[]" id="check_7" value="7" <?php if($console[12] == 7) { echo "checked=\"checked\""; } ?>  onclick="showMe('gctiv')" />Gamecube&nbsp;
                <input type="checkbox" name="console[]" id="check_8" value="8" <?php if($console[14] == 8) { echo "checked=\"checked\""; } ?>  onclick="showMe('dstiv')" />Nintendo DS&nbsp;
                <input type="checkbox" name="console[]" id="check_9" value="9" <?php if($console[16] == 9) { echo "checked=\"checked\""; } ?>  onclick="showMe('psptiv')" />PSP&nbsp;
             </td>
             <td><?php if (isset($err_console)) {error();}	?></td>
          </tr>        
        </table><br />

        
		<span class="title">Trade-in values:</span><br /><br />
        
        <div id="error" class="errortext" style="visibility:visible;">You have not selected a platform yet!<br /></div>
        
        <?php 
        
         $cons = array("pc","xbox360","ps3","wii","xbox","ps2","gc","ds","psp");
         //$plat = array("pc_check","xbox360_check","ps3_check","wii_check","xbox_check","ps2_check","gc_check","ds_check","psp_check");
         $div = array("pctiv","xbox360tiv","ps3tiv","wiitiv","xboxtiv","ps2tiv","gctiv","dstiv","psptiv");
		 
         $titl = array("PC TIV","XBOX 360 TIV","Playstation 3 TIV","Nintendo Wii TIV","XBOX TIV","Playstation 2 TIV","Gamecube TIV","Nintendo DS TIV","PS Portable TIV");
		 
         $flds = array("tiv_bb","tiv_eb","tiv_fs");
         $stors = array("Futureshop","EB Games","Blockbuster");
         
         for ($h=0; $h<=8; $h++) {
             echo "<div id=\"{$div[$h]}\" style=\"display:none;\">
                        <table cellpadding=\"4\" cellspacing=\"0\" border=\"0\">
                        <tr>
                                <td colspan=\"2\"><b>$titl[$h]:</b></td>
                        </tr>";
                    
                        for ($g=0; $g<=2; $g++){
                            
                            echo "<tr>
                                      <td>$stors[$g]</td>
                                      <td><input name=\"$flds[$g]_$cons[$h]\" type=\"text\" size=\"5\" /></td>
                                  </tr>";
                        }
                        
                        echo "</table></div>";
         }
        
         ?>
         
        <br />
        <input type="submit" value="Submit Game" name="submit" class="bodybutn" /><br /><br />         
		<?php 
          $_SESSION['tokenid'] = uniqid(md5(microtime()), true);
        ?>	
        <input type="hidden" name="tokenid" value="<?php echo $_SESSION['tokenid']; ?>" />
    </form>
<?php
}

include("includes/footer.php");


//								// start making the search query
//								$sql_search_query = "SELECT * FROM games WHERE game_name like ";
//											
//											// loop here
//											
//											foreach ($exploded_keywords as $keyword) {									
//													$kw++;
//													$sql_search_query .= "'%".$keyword."%' ";
//													
//													if ($kw <= $total_keywords) {
//														$sql_search_query .= "OR game_name like ";
//													}
//													
//											}
//									
//								// end making the search query 
//								$sql_search_query .=";";
//								
//								// process the search query
//								$gamecheck = mysql_query($sql_search_query) or die ("Error connecting to database");
//								$numba = mysql_num_rows($gamecheck);									
//								echo $sql_search_query;
//										// if the search query comes back with results then show the user suggestions
//										if (isset($numba) && $numba > 0) {
//											
//											$err_msg .= "We may have your game:<br />";
//									
//											$err_msg .= "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style =\"margin-top:5px;\">
//															<tr>
//															  <td><img src=\"images/err_c_topleft.png\" width=\"4\" height=\"4\" /></td>
//															  <td width=\"100%\" bgcolor=\"#fbc580\"></td>
//															  <td><img src=\"images/err_c_topright.png\" width=\"4\" height=\"4\" /></td>
//															</tr>
//															<tr>
//															  <td bgcolor=\"#fbc580\">&nbsp;</td>
//															  <td bgcolor=\"#fbc580\">";
//															  
//											$err_msg .= "<div style = \"float:right;\"><input type=\"checkbox\" name=\"pretty_sure\" value=\"1\" />&nbsp;No, I am 100% positive this is genuine!&nbsp;</div>";	
//											
//											// loop to display all the search results
//											for ($l=1; $l <= $numba; $l++) {										
//												$getgameid = mysql_fetch_array($gamecheck);
//												$err_msg .= "&nbsp;<a href = \"index.php?action=game&gameid=".$getgameid['id']."\" style=\"color:#900900\" target=\"_blank\" >".$getgameid['game_name']."</a><br />";
//												
//											}
//											
//											$err_msg .= "</td>
//												<td bgcolor=\"#fbc580\">&nbsp;</td>
//											  </tr>
//											  <tr>
//												<td><img src=\"images/err_c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
//												<td bgcolor=\"#fbc580\"></td>
//												<td><img src=\"images/err_c_bottomright.png\" width=\"4\" height=\"4\" /></td>
//											  </tr>
//											</table>";											
//											$game_exist_error = 1;	
//									}

?>

