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

if (isset($_POST['submit'])) {
			
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
			
		if (isset($_POST['err_page']) && $_POST['err_page'] != "") {
			$pageoferror = mysql_clean($_POST['err_page']);  ////////
		} else {
			$err_msg .= "<b>Error:</b> You must input the problematic page <br/>";
			$err_page = 1;
			$errorchk = 1;
		}
		
		if (isset($_POST['browser']) && $_POST['browser'] != "") {
			$browser = mysql_clean($_POST['browser']);   /////////////
		} else {
			$err_msg .= "<b>Error:</b> You must enter the type of browser <br/>";
			$err_browser = 1;
			$errorchk = 1;
		}
		
		if (isset($_POST['message']) && $_POST['message'] != "") {
			$error_msg = htmlspecialchars(mysql_clean($_POST['message']));   //////////////
		} else {
			$err_msg .= "<b>Error:</b> You must input what you saw <br/>";
			$err_message = 1;
			$errorchk = 1;
		}
		
		if (IDS_check() == true) {
			$errorchk = 1;
			$err_msg .= "<b>Error:</b> Invalid input <br/>";
		}
		
		if (!(isset($errorchk))) {
			$query="INSERT INTO errors(error_page,browser,error_message,email) VALUES ('{$pageoferror}','{$browser}','{$error_msg}','{$email}')";
		
			if (mysql_query($query)) {
				$success = 1;
				unset($errorchk);
			} else {
				$error = "We have an error";
			}
		}
	}
}

if (isset($success)){
	  echo "<center>
	   <table width=\"850\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
		<tr>
		  <td><img src=\"images/c_topleft.png\" width=\"4\" height=\"4\" /></td>
		  <td width=\"100%\" bgcolor=\"#e2eaf9\"></td>
		  <td><img src=\"images/c_topright.png\" width=\"4\" height=\"4\" /></td>
		</tr>
		<tr>
		  <td bgcolor=\"#e2eaf9\">&nbsp;</td>
		  <td bgcolor=\"#e2eaf9\"><div class=\"description\">Error has been submitted and we will look into it ASAP!</div></td>
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
    <td bgcolor="#e2eaf9"><span class="headdings">Bug Report</span></td>
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

<img src="images/debug.png" width="253" height="253" border="0" style="float:right; margin-right:40px;" />

<div class="errortext">
</div>


<div id="bodytext">

<form action="<?php echo $_SERVER['PHP_SELF']?>?action=bugreport" method="post">

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
    <td><input type="text" readonly="readonly" name="email" value="<?php if (isset($userdata['email'])) { echo $userdata['email']; } ?>" style="width:259px;"  /></td>
    <td><?php if (isset($err_email)) {error();}	?></td>
  </tr>

<?php } ?>


  <tr>
    <td><span class="title">Where did you see this error?</span><span class="aster">*</span></td>
    <td>&nbsp;</td>
    <td><input type="text" name="err_page" value="<?php if (isset($_POST['err_page'])) { echo $_POST['err_page']; } ?>" style="width:259px;"  /></td>
    <td><?php if (isset($err_page)) {error();}	?></td>
  </tr>
  <tr>
    <td><span class="title">What browser are you using?</span><span class="aster">*</span></td>
    <td>&nbsp;</td>
    <td><input type="text" name="browser" value="<?php if (isset($_POST['browser'])) { echo $_POST['browser']; } ?>" style="width:259px;"  /></td>
    <td><?php if (isset($err_browser)) {error();}	?></td>
  </tr>
  <tr>
    <td><span class="title">Please describe the problem</span><span class="aster">*</span></td>
    <td>&nbsp;</td>
    <td><textarea cols="30" rows="5" name="message"><?php if (isset($_POST['message'])) { echo $_POST['message']; } ?></textarea></td>
    <td><?php if (isset($err_message)) {error();}	?></td>
  </tr>
  <tr>
    <td><span class="title">Are you a robot?</span><span class="aster">*</span></td>
    <td>&nbsp;</td>
    <td><img src="captcha.php" alt="captcha" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="text" name="captcha" style="width:120px;" /></td>
    <td><?php if (isset($err_captcha)) {error();}	?></td>
  </tr>
  <tr>
    <td><input type="submit" name="submit" value="Submit Bug Report" class="bodybutn" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

	<?php 
    $_SESSION['tokenid'] = uniqid(md5(microtime()), true);
    ?>
    <input type="hidden" name="tokenid" value="<?php echo $_SESSION['tokenid']; ?>" />


</form>

</div>

<?php
}
?>