<?php

// page protection
//if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
//	header("Location: ../404.php");
//	unset($antihackey);
//	unset($_SESSION['antihackey']);
//}

if (isset($_GET['key']) && strlen($_GET['key']) > 30 && strlen($_GET['key']) < 55) {
	
	$key = mysql_clean($_GET['key']);
	
	$sql_searchkey = "SELECT username FROM users WHERE activation_key = '".mysql_clean($key)."' LIMIT 1;";
	$searchkey_result = mysql_query($sql_searchkey);
	
	if (mysql_num_rows($searchkey_result) == 1) {
			
		$split = str_split($_GET['key']);
		$storeme = array();
		
		for ($i=0; $i < strlen($_GET['key']); $i++) {
			
			if ($i > 15 && $i < strlen($_GET['key'])-16) {
				$storeme[] = $split[$i];
			}
		}
		
		$final = join("", $storeme);
		$final = mysql_clean(base64_decode($final));
		
		$sql_confirmkey = "SELECT username FROM users WHERE activation_key = '".mysql_clean($key)."' AND username = '".mysql_clean($final)."' LIMIT 1;";
		$confirmkey_result = mysql_query($sql_confirmkey);
		
		if (mysql_num_rows($confirmkey_result) == 1) {
			
			$sql_activate = "UPDATE users SET active = '1' WHERE username = '".mysql_clean($final)."' AND activation_key = '".mysql_clean($key)."' LIMIT 1;";
			
			if (mysql_query($sql_activate)) {
				
				$err_msg .= "Hey ".$final.", your account has been successfully activated.<br /> You may now login by going <a href=\"index.php?action=login\" style=\"color:#900900;\"> here</a>";
				
			} else {
				
				$err_msg .= "<b>Error:</b> The database connection screwed up! Retry! <br />";
				
			}
			
		} else {
			
			$err_msg .= "<b>Warning:</b> Incorrect or Invalid key! <br />";
			
		}
		
	} else {
		
		$err_msg .= "<b>Warning:</b> Incorrect or Invalid key! <br />";
	
	}
	
} else {
	
	$err_msg .= "<b>Warning:</b> Incorrect or Invalid key! <br />";
	
}

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="5" height="5" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="5" height="5" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Account Activation</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="5" height="5" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="5" height="5" /></td>
  </tr>
</table><br />

<center><table width="425" border="0" cellpadding="0" cellspacing="0">
   <tr>
    <td><img src="images/err_c_topleft.png" width="4" height="4" /></td>
    <td bgcolor="#fbc580"></td>
    <td><img src="images/err_c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#fbc580">&nbsp;</td>
    <td width="100%" bgcolor="#fbc580">
    
    <div class="report_warning">
    
    <table cellpadding="0" cellspacing="0" border="0">
        <tr align="left">
            <td><img src="images/report_logo.png" width="50" height="42" border="0" /></td>
            <td>&nbsp;&nbsp;</td>
            <td><?php echo $err_msg; ?></td>
      	</tr>
    </table>
    
    </div>
    </td>
    <td bgcolor="#fbc580">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/err_c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#fbc580"></td>
    <td><img src="images/err_c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table></center>