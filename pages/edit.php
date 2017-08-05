<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

$gamevalues = mysql_fetch_array($query);

if (isset($_POST['submit'])) {

	if ($_POST['tokenid'] != $_SESSION['tokenid']) {  
		 $err_msg .= "<b>Error</b>: WHOOPS! looks like we encountered an error <br/>";
	} else {
		unset($_SESSION['tokenid']);
		
		if (isset($_POST['submit'])) {
			if (isset($_POST['name_of_the_game']) && $_POST['name_of_the_game'] != "" ){
				
				if (!preg_match($validchars2, $_POST['name_of_the_game'])) {
					$err_msg .= "<b>Error:</b> Invalid characters in the Title<br/>";
					$err_title = 1;
				} else {
					$nameofgame = mysql_clean($_POST['name_of_the_game']);
				}
				
			} else {
				$err_msg = "<b>Error:</b> Please enter an appropriate game title <br/>";
				$err_title = 1;
			}
			
			// check if image url exists
			if (isset($_POST['image_url']) && $_POST['image_url'] != "" ){
				
				if (preg_match('#^images/games.*$#', $_POST['image_url'])) {
					$imageurl = mysql_clean($_POST['image_url']);
				} else {
					
					if(!preg_match('#^http://upload.wikimedia.org/.*(\.(jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG))$#', $_POST['image_url'])) {
					
					$err_msg .= "<b>Error:</b> Please enter a valid image URL. We only accept images from Wikipedia.<br/>";
					$err_img = 1;
					
					} else {
						
						if (is_url_valid($_POST['image_url']) == true) {					
							
							if (isset($_POST['name_of_the_game']) && $_POST['name_of_the_game'] != "" ) {
							
								$inval_chars = array(":", "+", " ", "/", "'");
								$prenameofgame = str_replace($inval_chars, "_", $nameofgame);
								$imageurl = writeimagefile($prenameofgame);
								
							}
							
						} else {
							$err_msg .= "<b>Error:</b> Please enter a valid image URL. We only accept images from Wikipedia1.<br/>";
							$err_img = 1;	
						}
					}
				}
					
			} else {
				$err_msg .= "<b>Error:</b> Please enter an image URL <br/>";
				$err_img = 1;
			}
			
			// check if esrbrating exists 
			if (isset($_POST['esrbrating']) && $_POST['esrbrating'] != "" ){
				$esrbrating = $_POST['esrbrating'];
			} else {
				$err_msg .= "<b>Error:</b> Please enter an ESRB Rating <br/>";
				$err_esrb = 1;
			}
			
			//check if video url exists but don't display error since it is not mandatory
			if (isset($_POST['video_url']) && $_POST['video_url'] != "" ){
				
				if(!preg_match('#^http://www.youtube.com/watch.*$#', $_POST['video_url'])) {
					
					$err_msg .= "<b>Error:</b> Please enter a valid video URL. We only accept videos from Youtube.<br/>";
					$err_vid = 1;
					
				} else {
					
					if (is_url_valid($_POST['video_url']) == true) {								
						$videourl = $_POST['video_url'];								
					} else {
						$err_msg .= "<b>Error:</b> Please enter a valid video URL. We only accept videos from Youtube.<br/>";
						$err_vid = 1;	
					}						
					
				}						
				
			}
			
			if (isset($_POST['console']) && $_POST['console'] != "") {
				$console = implode($_POST['console'],",");
			} else {
				$err_msg .="<b>Error:</b> Select the appropriate console(s) for the game <br/>";
				$err_console = 1;
			}
			
			foreach($_POST['tiv'] as $console_type => $store){
			
				foreach($store as $tivs){
		
					if (isset($tivs) && $tivs != "") {
						
						if ( strlen($tivs)<=5 && strpos($tivs, ".") <= 2 && strpos($tivs, ".") > 0 && is_numeric($tivs) == true && $tivs != 13.37) {
							
							$goforit = 1;
						
						} else {
							
							$err_msg .= "<b>Error:</b> There is something wrong with one of your trade in values. 12.34 is the only accepted format. <br/>";
							$game_exist_error = 1;

						}
						
					}
					
				}	
				
			}	
			
			
			if (isset($nameofgame) && isset($imageurl) && isset($esrbrating) && isset($console) && $gamevalues['game_name'] != $_POST['name_of_the_game'] ) {

						// clean the name of any special characters
						$clean_name = str_replace(":","",$nameofgame);						
						
						// check if the entered name is actually unique or whether the user is messing with the database
						$check_query = mysql_query("SELECT * FROM games WHERE game_name = '".$clean_name."';") or die ("Error connecting to database");
						$check_rows = mysql_num_rows($check_query);
						
						// if the user has been shows the suggestions OR the check query brings back results OR make sure pretty_sure IS CHECKED
						if ( $check_rows == 1 ) {
								
									$catch_data = mysql_fetch_array($check_query);
									
									$err_msg .= "<b>Error:</b> Your game already exists.<br/>
												<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style =\"margin-top:5px;\">
														  <tr>
															<td bgcolor=\"#fbc580\"></td>
															<td width=\"100%\" bgcolor=\"#fbc580\"></td>
															<td bgcolor=\"#fbc580\"></td>
														  </tr>
														  <tr>
															<td bgcolor=\"#fbc580\">&nbsp;</td>
															<td bgcolor=\"#fbc580\">
									
																&nbsp;<a href = \"index.php?action=game&gameid=".$catch_data['id']."\" style=\"color:#900900\" target=\"_blank\" >".$catch_data['game_name']."</a>
												
															</td>
														<td bgcolor=\"#fbc580\">&nbsp;</td>
													  </tr>
													  <tr>
														<td bgcolor=\"#fbc580\"></td>
														<td bgcolor=\"#fbc580\"></td>
														<td bgcolor=\"#fbc580\"></td>
													  </tr>
													</table>";
													
									$game_exist_error = 1;
							
						}
			}
			
			if (IDS_check() == true) {
				$game_exist_error = 1;
				$err_msg .= "<b>Error:</b> Invalid input <br/>";
			}
			
			
			if (isset($nameofgame) && isset($imageurl) && isset($esrbrating) && isset($console) && $game_exist_error != 1) {
				
				$query="UPDATE games SET `game_name` = '{$nameofgame}', image_url = '{$imageurl}', trailer_url = '{$videourl}', esrb = '{$esrbrating}', consoles = '{$console}' WHERE id = ".$id." LIMIT 1;";
				
				if (mysql_query($query)){
					
						/////////////////
						if ($goforit == 1){
							
							$temp = array();
							$temp2 = array();
							
								foreach($_POST['tiv'] as $console_type => $store){
									
									if ( isset($_POST['tiv'][$console_type]['fs']) && $_POST['tiv'][$console_type]['fs'] != "" && is_numeric($_POST['tiv'][$console_type]['fs']) ||
										 isset($_POST['tiv'][$console_type]['eb']) && $_POST['tiv'][$console_type]['eb'] != "" && is_numeric($_POST['tiv'][$console_type]['eb']) ||
										 isset($_POST['tiv'][$console_type]['bb']) && $_POST['tiv'][$console_type]['bb'] != "" && is_numeric($_POST['tiv'][$console_type]['bb']) ) {
														
										$temp2[] = "('".$id."','".mysql_clean($console_type)."'";
													 
										foreach($store as $tivs){
											
											$temp2[] = "'".mysql_clean($tivs)."'";
											
										}
										
										$temp[] = join(',',$temp2).',\''.time().'\')';
										
										$temp2 = array();
							
									}
								}
							
							$sql = join(',',$temp);
							
							
								$sql = "INSERT INTO tivs (gameID,consoleID,fs,eb,bb,time) VALUES $sql;";
								mysql_query($sql) or die ("Error establishing your face!");
								
								unset($goforit);
						}
						//////////////////////
						
						$success = 1;
						unset($game_exist_error);
						
						
						
					} else {
						
						$error = "We have an error";
					}
				} else {
					
					$error = "We have an error";
				}				
			}
	}
}


if (isset($success)){
	 echo "<table cellpadding=\"5\">
	 			<tr>
					<td><img src=\"images/messages/gameedited.png\" border = \"0\" /></td>
					<td>&nbsp;</td>
					<td align=\"center\"><div class=\"messages\">Succcess! Game has been edited!</div><br><br>
						<div class=\"messages2\">You can now go to the <a href=\"index.php?action=list\">list</a> and find your game in there or you can just <a href=\"index.php?action=game&gameid=".$id."\">click here</a> to go directly to its information page!</div></td>
				<tr>
			</table>";  
	  unset($success);
	} else {
	
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="5" height="5" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="5" height="5" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Edit the game</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="5" height="5" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="5" height="5" /></td>
  </tr>
  
  <?php    if(isset($err_msg)){ ?>
  <tr>
  	<td></td>
    <td>
    	<table width="400" border="0" cellpadding="0" cellspacing="0">
           <tr>
            <td colspan="3" background="images/subheadshadow.png" height="5"></td>
           </tr>
          <tr>
            <td bgcolor="#fbc580">&nbsp;</td>
            <td width="100%" bgcolor="#fbc580"><div class="subheadder"><?php echo $err_msg;
																			 unset($err_msg); ?></div></td>
            <td bgcolor="#fbc580">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/err_c_bottomleft.png" width="4" height="4" /></td>
            <td bgcolor="#fbc580"></td>
            <td><img src="images/err_c_bottomright.png" width="4" height="4" /></td>
          </tr>
        </table>    
    </td>
    <td></td>
  </tr>
  <?php } ?>
  
</table><br />

<div id="errorlnk" class="errortext">
</div>

<table cellpadding="0" cellspacing="2" border="0" style="float:right">  
    <tr><td></td></tr>    
    <tr>
      <td>
      <?php table_hints ("If you need to find more information on this game and make sure what you are editing is indeed correct, you can simply go to the <a href=\"javascript:lookforwiki()\">game's Wikipedia page.</a> There you will find the correct box art, ESRB rating, and the title of the game.");  ?>
      </td>
    </tr>    
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
      <td>
      <?php table_hints ("Don't see a trailer? Add one! <a href=\"javascript:lookforvid()\">Search Youtube</a>");  ?>
      </td>
    </tr>       
    <tr><td>&nbsp;</td></tr>    
    <tr>
      <td>
      <?php table_hints ("The <a href=\"javascript:lookforwiki()\">platforms</a> are also available on the game's wikipidia page provided above.");  ?>
      </td>
    </tr>    
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>    
    <tr>
      <td>
      <?php table_hints ("Shake um and bake um baby.");  ?>
      </td>
    </tr>    
</table>   

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=edit&gameid=<?php echo $id; ?>" style="float:left; margin-left:5px;" name="addgame">
        <table border="0" cellpadding="3" style="margin-left:-5px;">
          <tr>
            <td width="150"><span class="title">Title:</span><span class="aster">*</span></td>
            <td><input name="name_of_the_game" value="<?php if (isset($_POST['name_of_the_game'])) { echo $_POST['name_of_the_game']; } else if(isset($gamevalues['game_name'])) { echo $gamevalues['game_name']; }?>" type="text" size="35" id="gametitle" maxlength="40" /></td>
			<td><?php if (isset($err_title)) {error();}	?></td> 
            </td>
          </tr>
          <tr><td></td><td></td><td></td></tr>
          <tr>
            <td><span class="title">Boxart image URL:</span><span class="aster">*</span></td>
            <td><input name="image_url" value="<?php if (isset($imageurl)) { echo $imageurl; } else if(isset($gamevalues['image_url'])) { echo $gamevalues['image_url']; } ?>" type="text" size="35" /></td>
			<td><?php if (isset($err_img)) {error();}	?></div></td>
            </td>
          </tr>
          <tr><td></td><td></td><td></td></tr>
          <tr>
          	<td><span class="title">ESRB rating:</span><span class="aster">*</span></td>
            <td>
            <select name="esrbrating">
                <option value="">Please select a Rating</option>
                <option value="1" <?php if(isset($gamevalues['esrb']) && $gamevalues['esrb'] == 1) { echo "selected"; } ?> >Early Childhood</option>
                <option value="2" <?php if(isset($gamevalues['esrb']) && $gamevalues['esrb'] == 2) { echo "selected"; } ?> >Everyone</option>
                <option value="3" <?php if(isset($gamevalues['esrb']) && $gamevalues['esrb'] == 3) { echo "selected"; } ?> >Everyone 10+</option>
                <option value="4" <?php if(isset($gamevalues['esrb']) && $gamevalues['esrb'] == 4) { echo "selected"; } ?> >Teen</option>
                <option value="5" <?php if(isset($gamevalues['esrb']) && $gamevalues['esrb'] == 5) { echo "selected"; } ?> >Mature 17+</option>
                <option value="6" <?php if(isset($gamevalues['esrb']) && $gamevalues['esrb'] == 6) { echo "selected"; } ?> >Adult</option>
                <option value="7" <?php if(isset($gamevalues['esrb']) && $gamevalues['esrb'] == 7) { echo "selected"; } ?> >Rating Pending</option>
            </select>
            </td>
            <td><?php if (isset($err_esrb)) {error();}	?></td>
          </tr>
         <tr><td></td><td></td><td></td></tr>
         <tr>
			<td><span class="title">Trailer URL:</span></td>
            <td><input name="video_url" value="<?php if (isset($videourl)) { echo $videourl; } else if(isset($gamevalues['trailer_url'])) { echo $gamevalues['trailer_url']; } ?>" type="text" size="35" /></td>
            <td><?php if (isset($err_vid)) {error();}	?></div></td>
        </tr>
        <tr><td></td><td></td><td></td></tr>
        <tr>
        	<td colspan="2">
            	<span class="title">Platform Availability:</span><span class="aster">*</span><br /><br />
                <?php checkconsoles(); ?>
                <input type="checkbox" name="console[]" id="check_1" value="1" <?php if ($pcc == 1) { echo "checked=\"checked\""; }?> onclick="showMe('pctiv')" />PC&nbsp;
                <input type="checkbox" name="console[]" id="check_2" value="2" <?php if ($xbox360c == 1) { echo "checked=\"checked\""; }?> onclick="showMe('xbox360tiv')" />XBOX360&nbsp;
                <input type="checkbox" name="console[]" id="check_3" value="3" <?php if ($ps3c == 1) { echo "checked=\"checked\""; }?> onclick="showMe('ps3tiv')"  />PS3&nbsp;
                <input type="checkbox" name="console[]" id="check_4" value="4" <?php if ($wiic == 1) { echo "checked=\"checked\""; }?> onclick="showMe('wiitiv')" />Wii&nbsp;
                <input type="checkbox" name="console[]" id="check_5" value="5" <?php if ($xboxc == 1) { echo "checked=\"checked\""; }?> onclick="showMe('xboxtiv')" />XBOX&nbsp;
                <input type="checkbox" name="console[]" id="check_6" value="6" <?php if ($ps2c == 1) { echo "checked=\"checked\""; }?> onclick="showMe('ps2tiv')" />PS2&nbsp;
                <br /><br />
                <input type="checkbox" name="console[]" id="check_7" value="7" <?php if ($gcc == 1) { echo "checked=\"checked\""; }?> onclick="showMe('gctiv')" />Gamecube&nbsp;
                <input type="checkbox" name="console[]" id="check_8" value="8" <?php if ($dsc == 1) { echo "checked=\"checked\""; }?> onclick="showMe('dstiv')" />Nintendo DS&nbsp;
                <input type="checkbox" name="console[]" id="check_9" value="9" <?php if ($pspc == 1) { echo "checked=\"checked\""; }?> onclick="showMe('psptiv')" />PSP&nbsp;
             </td>
             <td><?php if (isset($err_console)) {error();}	?></td>
          </tr>        
        </table><br />

        
		<span class="title">Trade-in values:</span><br /><br />
        
        <div id="error" class="errortext" style="visibility:visible;">You have not selected a platform yet!<br /></div>
        
        <?php 
		
		$sql = "SELECT consoleID,console_name,name FROM consoles LIMIT 0,9 ;";
		$result = mysql_query($sql);
		 
		$flds = array("fs","eb","bb");
		$stors = array("Futureshop","EB Games","Blockbuster");
         
		while ($console_info = mysql_fetch_array($result)){
			
			$sql2 = "SELECT * FROM tivs WHERE gameID = ".$id." AND consoleID = ".$console_info['consoleID']." ORDER BY id DESC LIMIT 0,1;";
			$result2 = mysql_query($sql2);
			$tiv_info = mysql_fetch_array($result2);
			
		   echo "<div id=\"".$console_info['console_name']."tiv\" style=\"display:none;\">
					  <table cellpadding=\"4\" cellspacing=\"0\" border=\"0\">
					  <tr>
							  <td colspan=\"6\"><b>".$console_info['name']." Trade in values:</b></td>
					  </tr>";
					  
					  echo "<tr>";
				  
					  for ($g=0; $g<=2; $g++){
						  
						  echo "<td>$stors[$g]:</td>
								<td>$ <input name=\"tiv[".$console_info['consoleID']."][".$flds[$g]."]\" type=\"text\" size=\"3\" maxlength=\"5\" value =\"".$tiv_info[$flds[$g]]."\" /></td>";
								
					  }
					  
					  echo "</tr><tr><td colspan=\"6\"><hr noshade=\"noshade\" color=\"#e2eaf9\" /></td></tr>";
					  
					  echo "</table></div>";
		}
		
		?>
         
        <br />
        <input type="submit" value="Submit Game" name="submit" class="bodybutn" /><br /><br />       
        <?php 
        	$tokenid = md5(uniqid(rand(), true));
			$_SESSION['tokenid'] = $tokenid;
		?>
        <input type="hidden" name="tokenid" value="<?php echo $tokenid; ?>" />
    </form>
<?php
}


?>