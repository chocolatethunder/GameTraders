<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

if (isset($_POST['submit_profile']) ){
	
	if (isset($_POST['male']) && $_POST['male'] != "") {
		$gender = "M";		
	} else if (isset($_POST['female']) && $_POST['female'] != "") {
		$gender = "F";	
	} else {
		$form_error = 1;
		$err_mes .= "<b>Error:</b> Need your gender type <br />";
	}
	
	if (isset($_POST['agegroup']) && $_POST['agegroup'] != "" && $_POST['agegroup'] != 0) {
		$agegroup = mysql_clean($_POST['agegroup']);
	} else {
		$form_error = 1;
		$err_mes .= "<b>Error:</b> Need your agegroup <br />";
	}
	
	if (isset($_POST['console']) && $_POST['console'] != "") {
		$console = mysql_clean(implode($_POST['console'],","));
	} else {
		$err_mes .="<b>Error:</b> Need the appropriate console(s)<br/>";
		$form_error = 1;
	}
	
	if ($form_error != 1) {
		$sql_string = "UPDATE users SET gender = '".mysql_clean($gender)."', agegroup = '".mysql_clean($agegroup)."', own_cons = '".mysql_clean($console)."'  WHERE id = '".mysql_clean($_SESSION['userid'])."' LIMIT 1;";
		if (mysql_query($sql_string)) {
			$err_mes = "Thanks! You can change your preferences anytime by re-submitting this form.";
		} else {
			$err_mes = "Sorry there was an error please try again";
		}
	}
}

if (isset($_POST['submit_avatar']) ){
//define a maxim size for the uploaded images in Kb
 define ("MAX_SIZE","2000"); 

  
// Error codes
 $errorcode1= "<span style='color:#900900;' ><b>Error:</b> Hmm! It seems like you were not trying to upload an image. The only accepted file formats are gif, jpeg, jpg, and png.</span>";
 
 $errorcode2= "<span style='color:#900900;' ><b>Error:</b> You exceeded the image file limit. 2 MB or less.</span>";
 
 $errorcode3= "<span style='color:#900900;' ><b>Error:</b> Copy unsuccessfull! We might have screwed up!</span>";
 
 $errorcode4= "<span style='color:#336600;' ><b>Avatar has been changed successfully! A preview can be seen above.</b></span>";
 
 $errorcode6= "<span style='color:#900900;' ><b>Error:</b> Ok Genius you forgot to put IN an image. Try Again. This time with an image please.</span>";

 $errorcode7= "<span style='color:#900900;' ><b>Error:</b> Your image height is too big. The restriction is set to 500 px.</span>";

 $errorcode8= "<span style='color:#900900;' ><b>Error:</b> Your image width is too big. The restriction is set to 500 px.</span>";

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 		}

//This variable is used as a flag. The value is initialized with 0 (meaning no error found)  
//and it will be changed to 1 if an error occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
//checks if the form has been submitted

 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['image']['name'];
 	//if it is not empty
 	if (!$image) {
		$err_mes = $errorcode6;
	} else {
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests
			if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
							//print error message
							$err_mes = $errorcode1;
							$errors=1;
						} else {
					
						//get the size of the image in bytes
						 //$_FILES['image']['tmp_name'] is the temporary filename of the file
						 //in which the uploaded file was stored on the server
						 $size=filesize($_FILES['image']['tmp_name']);

						// check for file dimenstions. 
						list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
						$maxheight = 500;
						$maxwidth = 500;

						if ($width > $maxwidth) {
							$err_mes = $errorcode8;	
							$errors=1;
						} 
						elseif ($height > $maxheight) {
							$err_mes = $errorcode7;	
							$errors=1;
						} 
						
			
						//compare the size with the maxim size we defined and print error if bigger
						if ($size > MAX_SIZE*1024) {
							$err_mes = $errorcode2 ;
							$errors=1;
						}
						
						//we will give an unique name, for example the time in unix time format
						$image_name=$_SESSION['username'].".$extension";
						//the new name will be containing the full path where will be stored (images folder)
						$newname="images/avatars/".$image_name;
						//we verify if the image has been uploaded, and print error instead
						$copied = copy($_FILES['image']['tmp_name'], $newname);
						if (!$copied) 
						{
							$err_mes = $errorcode3;
							$errors=1;
						}
					}
					//If no errors registred, print the success message
					 if(isset($_POST['submit_avatar']) && !$errors) 
					 {
						$sql_updateavatar = "UPDATE users SET avatar = '".mysql_clean($newname)."' WHERE id = '".mysql_clean($_SESSION['userid'])."' LIMIT 1;";
						if (mysql_query($sql_updateavatar)) {
							$err_mes = $errorcode4;
						} else {
							$err_mes = $errorcode3;
						}
							
					 } 
	} 

}

$sql = "SELECT username, avatar, joindate FROM users WHERE id = '".mysql_clean($_SESSION['userid'])."';";
$process = mysql_query($sql) or die ("Error connecting to database");

$userdata = mysql_fetch_array($process);

$sql = "SELECT addedby FROM games WHERE addedby = '".mysql_clean($_SESSION['userid'])."';";
$process = mysql_query($sql) or die ("Error connecting to database");

$gamesadded = mysql_num_rows($process);


?>


<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Your account</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table><br />


<table width="300" border="0" cellpadding="0" cellspacing="0" style="margin-left:5px;">
	<tr valign="top">
    	<td width="85"><img src="<?php echo $userdata['avatar'] ?>" width="75" height="75" border="0" /></td>
        <td>
        	Welcome, <b><?php echo $userdata['username'] ?></b><br /><br />
            Joined on: <b><?php echo  unix_todate($userdata['joindate'], $format = 'd M Y') ?></b><br />
            Games added: <b><?php echo $gamesadded ?></b> <br />        
        </td>
	</tr>
    <tr>
    	<td><a href="index.php?action=account&default=avatar"><img src="images/change_pic.png" width="74" height="16" border="0" title="Change your avatar" /></a></td>
        <td></td>
    </tr>
</table>

    
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
    <td>&nbsp;</td>
    <td>
	<div id="usernavdiv">
    	<ul class="usernav">
            <li>
			<?php if (isset($_GET['default']) && $_GET['default'] == "about" || $_GET['default'] == "") {
				echo "<a href=\"index.php?action=account&default=about\" class=\"active\"><div class=\"usernav_wrapper_active\">About You</div></a>";
			} else {
				echo "<a href=\"index.php?action=account&default=about\" class=\"inactive\"><div class=\"usernav_wrapper_inactive\">About You</div></a>";
			}
			?>  
            <li>
			<?php if (isset($_GET['default']) && $_GET['default'] == "avatar") {
				echo "<a href=\"index.php?action=account&default=avatar\" class=\"active\"><div class=\"usernav_wrapper_active\">Edit Avatar</div></a>";
			} else {
				echo "<a href=\"index.php?action=account&default=avatar\" class=\"inactive\"><div class=\"usernav_wrapper_inactive\">Edit Avatar</div></a>";
			}
			?>
            </li>
        </ul>
    </div>
    </td>
    <td></td>
    </tr>


<?php

switch ($_GET['default']) {
	
	case 'avatar': ?>
    <tr>
      <td><img src="images/usermenu_topleft.png" width="4" height="4" /></td>
      <td width="100%" bgcolor="#96b8f8"></td>
      <td><img src="images/usermenu_topright.png" width="4" height="4" /></td>
    </tr>
    <tr>
      <td bgcolor="#96b8f8">&nbsp;</td>
      <td bgcolor="#96b8f8"><div id="navheadding">Change your avatar!</div></td>
      <td bgcolor="#96b8f8">&nbsp;</td>
    </tr>
    <tr>
      <td><img src="images/usermenu_bottomleft.png" width="4" height="4" /></td>
      <td bgcolor="#96b8f8"></td>
      <td><img src="images/usermenu_bottomright.png" width="4" height="4" /></td>
    </tr>   
    <tr>
      <td>&nbsp;</td>
      <td>
          <table border="0" cellpadding="0" cellspacing="0">
              <tr>
              <td colspan="3" background="images/subheadshadow.png" height="5"></td>
              </tr>
            <tr>
              <td bgcolor="#fbc580">&nbsp;</td>
              <td width="100%" bgcolor="#fbc580"><div class="subheadder">
              <?php 
			  if (isset($err_mes)) {
				  echo $err_mes;
				  unset($err_mes);
			  } else {
				  echo "Only gif, jpeg, jpg, and png are accepted with a max file size of 2 MB.<br />All images will be resized to 100px x 100px. ";
			  }
			  
			  ?>              
              </div></td>
              <td bgcolor="#fbc580">&nbsp;</td>
            </tr>
            <tr>
              <td><img src="images/err_c_bottomleft.png" width="4" height="4" /></td>
              <td bgcolor="#fbc580"></td>
              <td><img src="images/err_c_bottomright.png" width="4" height="4" /></td>
            </tr>
          </table>
      
      </td>
      <td>&nbsp;</td>
    </tr>
    </table><br /> 
    
    
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?action=account&default=avatar" method="post" enctype="multipart/form-data">
    <table width="300" border="0" cellpadding="0" cellspacing="0" style="margin-left:10px;"> 
      <tr>
        <td></td>
        <td><input type="file" name="image" /></td>
        <td></td>
        <td><input type="submit" name="submit_avatar" value="Change" /></td>
      </tr>
      
    </table>
    </form>
    <br /><br />
    <?php 
	break;
	
	case 'about': ?>
    <tr>
      <td><img src="images/usermenu_topleft.png" width="4" height="4" /></td>
      <td width="100%" bgcolor="#96b8f8"></td>
      <td><img src="images/usermenu_topright.png" width="4" height="4" /></td>
    </tr>
    <tr>
      <td bgcolor="#96b8f8">&nbsp;</td>
      <td bgcolor="#96b8f8"><div id="navheadding">Tell us about yourself</div></td>
      <td bgcolor="#96b8f8">&nbsp;</td>
    </tr>
    <tr>
      <td><img src="images/usermenu_bottomleft.png" width="4" height="4" /></td>
      <td bgcolor="#96b8f8"></td>
      <td><img src="images/usermenu_bottomright.png" width="4" height="4" /></td>
    </tr>   
    <tr>
      <td>&nbsp;</td>
      <td>
          <table border="0" cellpadding="0" cellspacing="0">
              <tr>
              <td colspan="3" background="images/subheadshadow.png" height="5"></td>
              </tr>
            <tr>
              <td bgcolor="#fbc580">&nbsp;</td>
              <td width="100%" bgcolor="#fbc580"><div class="subheadder">
              
              <?php 
			  if (isset($err_mes)) {
				  echo $err_mes;
				  unset($err_mes);
			  } else {
				  echo "Don't worry we wont share your info with anyone!";
			  }
			  
			  ?> 
              
              </div></td>
              <td bgcolor="#fbc580">&nbsp;</td>
            </tr>
            <tr>
              <td><img src="images/err_c_bottomleft.png" width="4" height="4" /></td>
              <td bgcolor="#fbc580"></td>
              <td><img src="images/err_c_bottomright.png" width="4" height="4" /></td>
            </tr>
          </table>
      
      </td>
      <td>&nbsp;</td>
    </tr>
    </table> 
 
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?action=account" >
    <table width="300" border="0" cellpadding="7" cellspacing="1">
        <tr>
            <td><b>Sex:</b></td><td><input type="radio" name="male" <?php if(isset($_POST['male']) ) { echo "checked"; } ?>  /> Male&nbsp;<input type="radio" name="female" <?php if(isset($_POST['female']) ) { echo "checked"; } ?> />Female</td>
        </tr>
        <tr>
            <td><b>Age group:</b></td><td><select name="agegroup">
                                            <option value="0">Select an age group</option>
                                            <option value="1" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 1) { echo "selected"; } ?>>13-19</option>
                                            <option value="2" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 2) { echo "selected"; } ?>>20-25</option>
                                            <option value="3" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 3) { echo "selected"; } ?>>26-30</option>
                                            <option value="4" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 4) { echo "selected"; } ?>>31-35</option>
                                            <option value="5" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 5) { echo "selected"; } ?>>36-40</option>
                                            <option value="6" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 6) { echo "selected"; } ?>>41-45</option>
                                            <option value="7" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 7) { echo "selected"; } ?>>46-50</option>
                                            <option value="8" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 8) { echo "selected"; } ?>>51-60</option>
                                            <option value="9" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 9) { echo "selected"; } ?>>61-70</option>
                                            </select></td>
        </tr>
        <tr>
            <td colspan="2"><b>What consoles do you own?</b></td>
        </tr>
        <tr>
            <td colspan="2">
            <table width="375" border="0" cellspacing="4" cellpadding="0">
              <tr>
                <td><input type="checkbox" name="console[]" value="1" />PC&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="2" />XBOX 360&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="3" />PS3&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="4" />Nintendo Wii&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"></td>
              </tr>
              <tr>
                <td><input type="checkbox" name="console[]" value="5" />XBOX&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="6" />PS2&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="7" />Gamecube&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"></td>
              </tr>
              <tr>
                <td><input type="checkbox" name="console[]" value="8" />PSP&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="9" />Nintendo DS&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"><input type="submit" name="submit_profile" value="Submit" class="bodybutn" /></td>
              </tr>
            </table>
            </td>
        </tr>

    </table>
	</form>
    <br />
    
	<?php 
	break;
	
	default: ?>
    <tr>
      <td><img src="images/usermenu_topleft.png" width="4" height="4" /></td>
      <td width="100%" bgcolor="#96b8f8"></td>
      <td><img src="images/usermenu_topright.png" width="4" height="4" /></td>
    </tr>
    <tr>
      <td bgcolor="#96b8f8">&nbsp;</td>
      <td bgcolor="#96b8f8"><div id="navheadding">Tell us about yourself</div></td>
      <td bgcolor="#96b8f8">&nbsp;</td>
    </tr>
    <tr>
      <td><img src="images/usermenu_bottomleft.png" width="4" height="4" /></td>
      <td bgcolor="#96b8f8"></td>
      <td><img src="images/usermenu_bottomright.png" width="4" height="4" /></td>
    </tr>   
    <tr>
      <td>&nbsp;</td>
      <td>
          <table border="0" cellpadding="0" cellspacing="0">
              <tr>
              <td colspan="3" background="images/subheadshadow.png" height="5"></td>
              </tr>
            <tr>
              <td bgcolor="#fbc580">&nbsp;</td>
              <td width="100%" bgcolor="#fbc580"><div class="subheadder"><?php 
			  if (isset($err_mes)) {
				  echo $err_mes;
				  unset($err_mes);
			  } else {
				  echo "Don't worry we wont share your info with anyone!";
			  }
			  
			  ?> </div></td>
              <td bgcolor="#fbc580">&nbsp;</td>
            </tr>
            <tr>
              <td><img src="images/err_c_bottomleft.png" width="4" height="4" /></td>
              <td bgcolor="#fbc580"></td>
              <td><img src="images/err_c_bottomright.png" width="4" height="4" /></td>
            </tr>
          </table>
      
      </td>
      <td>&nbsp;</td>
    </tr>
    </table>
 
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=account" method="post" >
    <table width="300" border="0" cellpadding="7" cellspacing="1">
        <tr>
            <td><b>Sex:</b></td><td><input type="radio" name="male" <?php if(isset($_POST['male']) ) { echo "checked"; } ?>  /> Male&nbsp;<input type="radio" name="female" <?php if(isset($_POST['female']) ) { echo "checked"; } ?> />Female</td>
        </tr>
        <tr>
            <td><b>Age group:</b></td><td><select name="agegroup">
                                            <option value="0">Select an age group</option>
                                            <option value="1" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 1) { echo "selected"; } ?>>13-19</option>
                                            <option value="2" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 2) { echo "selected"; } ?>>20-25</option>
                                            <option value="3" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 3) { echo "selected"; } ?>>26-30</option>
                                            <option value="4" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 4) { echo "selected"; } ?>>31-35</option>
                                            <option value="5" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 5) { echo "selected"; } ?>>36-40</option>
                                            <option value="6" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 6) { echo "selected"; } ?>>41-45</option>
                                            <option value="7" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 7) { echo "selected"; } ?>>46-50</option>
                                            <option value="8" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 8) { echo "selected"; } ?>>51-60</option>
                                            <option value="9" <?php if(isset($_POST['agegroup']) && $_POST['agegroup'] == 9) { echo "selected"; } ?>>61-70</option>
                                            </select></td>
        </tr>
        <tr>
            <td colspan="2"><b>What consoles do you own?</b></td>
        </tr>
        <tr>
            <td colspan="2">
            <table width="375" border="0" cellspacing="4" cellpadding="0">
              <tr>
                <td><input type="checkbox" name="console[]" value="1" />PC&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="2" />XBOX 360&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="3" />PS3&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="4" />Nintendo Wii&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"></td>
              </tr>
              <tr>
                <td><input type="checkbox" name="console[]" value="5" />XBOX&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="6" />PS2&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="7" />Gamecube&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"></td>
              </tr>
              <tr>
                <td><input type="checkbox" name="console[]" value="8" />PSP&nbsp;</td>
                <td><input type="checkbox" name="console[]" value="9" />Nintendo DS&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4"><input type="submit" name="submit_profile" value="Submit" class="bodybutn" /></td>
              </tr>
            </table>
            </td>
        </tr>

    </table>
	</form>
    <br />
    <?php 
	break;
	
}

?>




