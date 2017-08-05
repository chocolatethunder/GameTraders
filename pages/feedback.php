<?php 

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

$sql = "SELECT username, email FROM users WHERE id = '".mysql_clean($_SESSION['userid'])."';";
$process = mysql_query($sql) or die ("Error connecting to database");

$userdata = mysql_fetch_array($process);

if (isset($_POST['submit_feedback'])) {
			
	if ($_POST['tokenid'] != $_SESSION['tokenid']) {  
		$err_msg .= "<b>Error</b>: WHOOPS! looks like we encountered an error <br/>";
		$errorchk = 1;
		
	} else {
		
		if (!isset($_POST['captcha']) || $_POST['captcha'] == "" || $_SESSION['security_code'] != $_POST['captcha']) {
			$err_msg = "<b>Error:</b> Image verification failed <br/>";
			$err_captcha = 1;
			$errorchk = 1;
		}
		
		if (isset($_POST['email']) && $_POST['email'] != "") {
			$email = mysql_clean($_POST['email']);  ////////
		} else {
			$err_msg .= "<b>Error:</b> You must input your email <br/>";
			$err_email = 1;
			$errorchk = 1;
		}
		
		if (isset($_POST['topic']) && $_POST['topic'] != "" && $_POST['topic'] != "0") {
			$topic = mysql_clean($_POST['topic']);  ////////
		} else {
			$err_msg .= "<b>Error:</b> You must select a topic <br/>";
			$err_topic = 1;
			$errorchk = 1;
		}
		
		if (isset($_POST['message']) && $_POST['message'] != "") {
			$msg = htmlspecialchars(mysql_clean($_POST['message']));   //////////////
		} else {
			$err_msg .= "<b>Error:</b> You must input some message <br/>";
			$err_message = 1;
			$errorchk = 1;
		}
		
		if (IDS_check() == true) {
			$errorchk = 1;
			$err_msg .= "<b>Error:</b> Invalid input <br/>";
		}
		
		if (!(isset($errorchk))) {
			$query="INSERT INTO feedback (email, topic , message) VALUES ('{$email}','{$topic}','{$msg}')";
		
			if (mysql_query($query)) {
				
				if ($_POST['topic'] == 2 || $_POST['topic'] == 3 || $_POST['topic'] == 5) {
					
					$mail_to = "support@icantradegames.com";
				
					switch ($_POST['topic']) {
					
					case "2":
					$mail_subject = "Advertising";
					break;
					
					case "3":
					$mail_subject = "Help";
					break;
					
					case "5":
					$mail_subject = "FAQ";
					break;
					
					}
					
					$mail_headers = "From: ".$_POST['email']."\r\n";
					$mail_headers .= "MIME-Version: 1.0\r\n";
					$mail_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
					$mail_message = "<html><body>";
					$mail_message .= $_POST['message'];
					$mail_message .= "</body></html>";
					
					mail($mail_to, $mail_subject, $mail_message, $mail_headers, "-f ".$_POST['email']."");
				
				}
				
				$success = 1;
				unset($errorchk);
			} else {
				$err_msg = "We have an error";
			}
		}
		
	}
	
}

if (isset($success)){
	  echo "<center>
	   <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
		<tr>
		  <td><img src=\"images/c_topleft.png\" width=\"4\" height=\"4\" /></td>
		  <td width=\"100%\" bgcolor=\"#e2eaf9\"></td>
		  <td><img src=\"images/c_topright.png\" width=\"4\" height=\"4\" /></td>
		</tr>
		<tr>
		  <td bgcolor=\"#e2eaf9\">&nbsp;</td>
		  <td bgcolor=\"#e2eaf9\"><div class=\"description\">Thank you for your feedback!</div></td>
		  <td bgcolor=\"#e2eaf9\">&nbsp;</td>
		</tr>
		<tr>
		  <td><img src=\"images/c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
		  <td bgcolor=\"#e2eaf9\"></td>
		  <td><img src=\"images/c_bottomright.png\" width=\"4\" height=\"4\" /></td>
		</tr>
	  </table></center>";  
	  
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
    <td bgcolor="#e2eaf9"><span class="headdings">Feedback</span></td>
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

<img src="images/feedback.png" width="253" height="240" border="0" style="float:right; margin-right:40px;" />

<div id="bodytext">

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=feedback" method="post">

<table border="0">
<?php if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) { ?>

  <tr>
    <td><span class="title">Your Email</span><span class="aster">*</span></td>
    <td>&nbsp;</td>
    <td><input type="text" name="email" value="<?php if (isset($email)) { echo $email; } ?>" style="width:259px;"  /></td>
    <td><?php if (isset($err_email)) {error();}	?></td>
  </tr>
  
<?php } else {?>

  <tr>
    <td><span class="title">Your Email</span><span class="aster">*</span></td>
    <td>&nbsp;</td>
    <td><input type="text" readonly="readonly" name="email" value="<?php if (isset($userdata['email'])) { echo $userdata['email']; } ?>" style="width:266px;"  /></td>
    <td><?php if (isset($err_email)) {error();}	?></td>
  </tr>

<?php } ?>
  <tr>
    <td><span class="title">Pick a topic</span><span class="aster">*</span></td>
    <td>&nbsp;</td>
    <td><select name="topic">
      <option value="0">Pick one (required)</option>
      <option value="1">General Feedback</option>
      <option value="2">Advertising Opportunities</option>
      <option value="3">General Help</option>
      <option value="4">Report Abuse</option>
      <option value="5">Unanswered FAQ</option>
      </select></td>
    <td><?php if (isset($err_topic)) {error();}	?></td>
  </tr>
  <tr>
    <td><span class="title">Your Message</span><span class="aster">*</span></td>
    <td>&nbsp;</td>
    <td><textarea style="width:260px;" rows="6" name="message"><?php if (isset($_POST['message'])) { echo $_POST['message']; } ?></textarea></td>
    <td valign="top"><?php if (isset($err_message)) {error();}	?></td>
  </tr>
  <tr>
    <td><span class="title">Are you a robot?</span><span class="aster">*</span></td>
    <td></td>
    <td><img src="captcha.php" alt="captcha" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td><input type="text" name="captcha" style="width:120px;" /></td>
    <td><?php if (isset($err_captcha)) {error();}	?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr valign="top">
    <td><input type="submit" value="Submit Feedback" name="submit_feedback" class="bodybutn" /></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    </tr>
</table>

	<?php 
    $_SESSION['tokenid'] = uniqid(md5(microtime()), true);
    ?>
    <input type="hidden" name="tokenid" value="<?php echo $_SESSION['tokenid']; ?>" />

</form>

</div>

<?php } ?>
