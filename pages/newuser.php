<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

if (isset($_POST['submituser']) ) {
	
	if ($_POST['tokenid'] != $_SESSION['tokenid']) {
		$err_msg .= "<b>Error</b>: WHOOPS! looks like we encountered an error <br/>";
	} else {
		
		unset($_SESSION['tokenid']);
		
		// Begin processing here
		
		// Check captcha
		if (!isset($_POST['captcha']) || $_POST['captcha'] == "" || $_SESSION['security_code'] != $_POST['captcha']) {
			$err_msg = "<b>Error</b>: Image verification failed <br/>";

			$err_captcha = 1;
			$errorchk = 1;
		}
		
		// check username
		if (isset($_POST['user']) && $_POST['user'] != "" && strlen($_POST['user']) >= 4 && strlen($_POST['user']) <= 10) {
			// check username for special characters
			if (!preg_match ($validchars, $_POST['user'])) {
			  $err_msg .= "<b>Error</b>: Invalid characters in username <br/>";
			  $err_user = 1;
			  $errorchk = 1;
			} else {			
				
				$new_user_check = mysql_clean($_POST['user']);
				
				$sql_checkusername = "SELECT username FROM users WHERE username = '".mysql_clean($new_user_check)."' ";
				$process_check = mysql_query($sql_checkusername) or die ("Error connecting to database");
				
				if (mysql_num_rows($process_check) == 0) {
					$new_user = mysql_clean($_POST['user']);
				} else {
					$err_msg .= "<b>Error</b>: Username is already taken <br/>";
					$err_user = 1;
					$errorchk = 1;
				}
				
			}
			
		} else {
			$err_msg .= "<b>Error</b>: Invalid username <br/>";
			$err_user = 1;
			$errorchk = 1;
		}		
		
		// check password
		if (isset($_POST['pass']) && $_POST['pass'] != "" && strlen($_POST['pass']) >= 4 && strlen($_POST['pass']) <= 10) {
			// check password for special characters
			if (!preg_match ($validchars, $_POST['pass'])) {
			  $err_msg .= "<b>Error</b>: Invalid characters in password <br/>";
			  $err_pass = 1;
			  $errorchk = 1;
			} else {
				$new_pass = mysql_clean($_POST['pass']);
			}
			
		} else {
			$err_msg .= "<b>Error</b>: Invalid password <br/>";
			$err_pass = 1;
			$errorchk = 1;
		}
		
		// check the confirming password
		if (isset($_POST['pass_confirm']) && $_POST['pass_confirm'] != "" && strlen($_POST['pass_confirm']) >= 4 && strlen($_POST['pass_confirm']) <= 10) {
			// check pass_confirm for special characters
			if (!preg_match ($validchars, $_POST['pass_confirm'])) {
				$err_pass_confirm = 1;
			  	$errorchk = 1;
			} else {
				$new_pass_confirm = mysql_clean($_POST['pass_confirm']);
			}
			
		} else {
			$err_msg .= "<b>Error</b>: Please re-enter your password <br/>";
			$err_pass_confirm = 1;
			$errorchk = 1;
		}
		
		// check if pass and pass_confirm are same
		if ($_POST['pass'] != $_POST['pass_confirm']) {
			$err_msg .= "<b>Error</b>: Passwords don't match, genius <br/>";
			$errorchk = 1;
			$err_pass = 1;
			$err_pass_confirm = 1;
		}
		
		// check if email is valid
		if (isset($_POST['email']) && $_POST['email'] != "") {
			
			if (validateEmail($_POST['email']) == true ){					
				
				$new_email_check = mysql_clean($_POST['email']);
				
				$sql_checkemail = "SELECT email FROM users WHERE email = '".mysql_clean($new_email_check)."' ";
				$process_check2 = mysql_query($sql_checkemail) or die ("Error connecting to database");
				
				if (mysql_num_rows($process_check2) == 0) {
					$new_email = mysql_clean($_POST['email']);
				} else {
					$err_msg .= "<b>Error</b>: Email address already exists <br/>";
					$err_email = 1;
					$errorchk = 1;
				}
				
			} else {
				$err_msg .= "<b>Error</b>: Email HAS to be real <br/>";
				$err_email = 1;
				$errorchk = 1;
			}
			
		} else {
			$err_msg .= "<b>Error</b>: Invalid email <br/>";
			$err_email = 1;
			$errorchk = 1;
		}
		
		// check if email is valid
		if (isset($_POST['email_confirm']) && $_POST['email_confirm'] != "") {
			
			if (validateEmail($_POST['email_confirm']) == true ){
				$new_email_confirm = mysql_clean($_POST['email_confirm']);
			} else {
				$err_email_confirm = 1;
				$errorchk = 1;
			}
			
		} else {
			$err_msg .= "<b>Error</b>: Please re-enter your email <br/>";
			$err_email_confirm = 1;
			$errorchk = 1;
		}
		
		
		// check if email and email_confirm are same
		if ($_POST['email'] != $_POST['email_confirm']) {
			$err_msg .= "<b>Error</b>: Emails don't match, genius <br/>";
			$errorchk = 1;
			$err_email = 1;
			$err_email_confirm = 1;
		}
		
		// check if the user agrees with the TOS
		if (!isset($_POST['tosagree']) ) {
			$err_msg .= "<b>Error</b>: You didn't agree with the TOS Agreement <br/>";
			$err_tos = 1;
			$errorchk = 1;
		}
		
		if (IDS_check() == true) {
			$errorchk = 1;
			$err_msg .= "<b>Error:</b> Invalid input <br/>";
		}
		
		if ($errorchk != 1 && isset($new_user) && isset($new_pass) && isset($new_pass_confirm) && isset($new_email) && isset($new_email_confirm) ) {
			
			$akey = randomKey(16).base64_encode($new_user).randomKey(16);
			
			$sql_insert_new_user = "INSERT INTO users (username, pass_hash, email, activation_key, active, joindate) VALUES ('".$new_user."','".md5($new_pass)."','".$new_email."','".$akey."','0','".time()."');";
			
			if (mysql_query($sql_insert_new_user)) {
				$mail_to = $new_email;
				$mail_subject = "Your email activation";
				
				$mail_headers = "From: \"Account Registration\"<user_registration@icantradegames.com>\r\n";
				$mail_headers .= "MIME-Version: 1.0\r\n";
				$mail_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				
				$mail_message = "<html><body>";
				$mail_message .= "Dear ".$new_user.", <br/><br/>";
				$mail_message .= "Thank you for signing up with us. Here is your activation key http://www.webdev.icantradegames.com/index.php?action=activate&key=".$akey."";
				$mail_message .= "<br />";
				$mail_message .= "<br />";
				$mail_message .= "Note: If you are having trouble then just simply copy and paste this part in your address bar:";
				$mail_message .= "<br />";
				$mail_message .= "<br />";
				$mail_message .= "http://www.icantradegames.com/index.php?action=activate&key=".$akey."";
				$mail_message .= "<br />";
				$mail_message .= "Hope to see you around. <br />";
				$mail_message .= "<br />";
				$mail_message .= "<br />";
				$mail_message .= "Gametraders Canada";
				$mail_message .= "</body></html>";
				
				if (mail($mail_to, $mail_subject, $mail_message, $mail_headers, "-f user_registration@icantradegames.com")) {
					$email_success = 1;
				} else {
					$email_success = 2;
				}				
			} else {
				$err_msg .= "<b>Error</b>: There was an issue with the database connection. Please try again. <br/>";
			}
			
		}
		
	}
	
}


?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Register with us!</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
  
  <?php    if(isset($err_msg)){ ?>
  <tr>
  	<td></td>
    <td>
    	<table width="300" border="0" cellpadding="0" cellspacing="0">
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

<?php if (isset($email_success) && $email_success == 1) {
	
    echo "<center>
	   <table width=\"850\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
		<tr>
		  <td><img src=\"images/c_topleft.png\" width=\"4\" height=\"4\" /></td>
		  <td width=\"100%\" bgcolor=\"#e2eaf9\"></td>
		  <td><img src=\"images/c_topright.png\" width=\"4\" height=\"4\" /></td>
		</tr>
		<tr>
		  <td bgcolor=\"#e2eaf9\">&nbsp;</td>
		  <td bgcolor=\"#e2eaf9\"><div class=\"description\">Thanks! Your confirmation email is on its way!</div></td>
		  <td bgcolor=\"#e2eaf9\">&nbsp;</td>
		</tr>
		<tr>
		  <td><img src=\"images/c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
		  <td bgcolor=\"#e2eaf9\"></td>
		  <td><img src=\"images/c_bottomright.png\" width=\"4\" height=\"4\" /></td>
		</tr>
	  </table></center>";
	unset($email_success);
	
} else if (isset($email_success) && $email_success == 2) {
	
	echo "<center>
	   <table width=\"850\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
		<tr>
		  <td><img src=\"images/c_topleft.png\" width=\"4\" height=\"4\" /></td>
		  <td width=\"100%\" bgcolor=\"#e2eaf9\"></td>
		  <td><img src=\"images/c_topright.png\" width=\"4\" height=\"4\" /></td>
		</tr>
		<tr>
		  <td bgcolor=\"#e2eaf9\">&nbsp;</td>
		  <td bgcolor=\"#e2eaf9\"><div class=\"description\">Seems like there was an error enrolling you. Either that or the server failed. Please try again.</div></td>
		  <td bgcolor=\"#e2eaf9\">&nbsp;</td>
		</tr>
		<tr>
		  <td><img src=\"images/c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
		  <td bgcolor=\"#e2eaf9\"></td>
		  <td><img src=\"images/c_bottomright.png\" width=\"4\" height=\"4\" /></td>
		</tr>
	  </table></center>";
	unset($email_success);
    
} else {
	
	?>

<table cellpadding="0" cellspacing="0" border="0" style="float:right">
	<tr>
        <td><?php table_hints ("Username and Password must be <u>10 characters maximum</u> and <u>4 characters minimum</u>. <u>No special characters</u> and <u>no spaces</u> are allowed (with the exception of underscore) but <u>can only contain alphabets and numbers</u> like 1337SP3AK.");  ?></td>
        </td>
    </tr>
    
    <tr><td>&nbsp;</td></tr>
    
    <tr>
		<td><?php table_hints ("Match the passwords and win the game, the game of signing up that is.");  ?></td>
    </tr>
    
        <tr><td>&nbsp;</td></tr>
    
    <tr>
    	<td><?php table_hints ("The email is used to send out a key that is used to identify you. Sorry we have to check for these things. Just like you, we are also trying to reduce spam and not encourage it. You may read our <a href=\"index.php?action=privacypp\">privacy policy</a>.");  ?></td>
    </tr>
    
</table>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=newuser" name="newuserForm" id="newuserForm">

	<div id="errorlnk" class="errortext"></div>

    <table cellpadding="4" cellspacing="3" border="0">
    	<tr>
        	<td><span class="title">Username</span><span class="aster">*</span></td>
            <td></td>
            <td><input type="text" style="width:150px;" name="user" value="<?php if (isset($_POST['user'])) { echo $_POST['user']; } ?>" maxlength="10" /></td>
            <td><?php if (isset($err_user)) {error();}	?></td> 
        </tr>
        <tr>
    		<td><span class="title">Password</span><span class="aster">*</span></td>
            <td></td>
            <td><input type="password" style="width:150px;" name="pass" maxlength="10" /></td>
            <td><?php if (isset($err_pass)) {error();}	?></td> 
        </tr>
        <tr>
    		<td><span class="title">Password Confirm</span><span class="aster">*</span></td>
            <td></td>
            <td><input type="password" style="width:150px;" name="pass_confirm" maxlength="10" /></td>
            <td><?php if (isset($err_pass_confirm)) {error();}	?></td> 
        </tr>
        <tr>
    		<td><span class="title">Email Address</span><span class="aster">*</span></td>
            <td></td>
            <td><input type="text" style="width:150px;" name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" /></td>
            <td><?php if (isset($err_email)) {error();}	?></td> 
        </tr>
        <tr>
    		<td><span class="title">Email Confirm</span><span class="aster">*</span></td>
            <td></td>
            <td><input type="text" style="width:150px;" name="email_confirm" value="<?php if (isset($_POST['email_confirm'])) { echo $_POST['email_confirm']; } ?>" /></td>
            <td><?php if (isset($err_email_confirm)) {error();}	?></td> 
        </tr>
        <!--insert captcha here -->
        <tr>
    		<td></td>
            <td></td>
            <td></td>
            <td></td> 
        </tr>
       	<tr>
    		<td><span class="title">Are you a robot?</span><span class="aster">*</span></td>
            <td></td>
            <td><img src="captcha.php" alt="captcha" /></td>
            <td></td> 
        </tr>
       	<tr>
    		<td>&nbsp;</td>
            <td></td>
            <td><input type="text" name="captcha" style="width:150px;" /></td>
            <td><?php if (isset($err_captcha)) {error();}	?></td> 
        </tr>
        <tr>
    		<td colspan="3"><input type="checkbox" name="tosagree" />&nbsp;I agree with the <a href="index.php?action=privacypp">Terms and Conditions</a></td>
            <td><?php if (isset($err_tos)) {error();}	?></td> 
        </tr>
        <tr>
    		<td><input type="submit" name="submituser" value="Register" class="bodybutn" /></td>
            <td></td>
            <td></td>
        </tr>
        <?php 
		  $tokenid = md5(uniqid(rand(), true));
		  $_SESSION['tokenid'] = $tokenid;
		?>
		<input type="hidden" name="tokenid" value="<?php echo $tokenid; ?>" />
        
     </table> 
    
</form>

<?php 

}

?>
