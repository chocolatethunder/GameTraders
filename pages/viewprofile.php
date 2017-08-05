<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

$sql = "SELECT username, avatar, joindate FROM users WHERE id = '".mysql_clean($_GET['uid'])."';";
$process = mysql_query($sql) or die ("Error connecting to database");

$userdata = mysql_fetch_array($process);

$sql = "SELECT addedby FROM games WHERE addedby = '".mysql_clean($_GET['uid'])."';";
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
    <td bgcolor="#e2eaf9"><span class="headdings">Profile</span></td>
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
    	<td rowspan="2" width="85"><img src="<?php echo $userdata['avatar']; ?>" width="75" height="75" border="0" title="<?php echo $userdata['username']."'s avatar"; ?>" /></td>
        <td>
        	You are looking at <b><?php echo $userdata['username']; ?></b>'s profile, who joined Gametraders Canada on <b><?php echo  unix_todate($userdata['joindate'], $format = 'd M Y'); ?></b> and has added <b><?php echo $gamesadded; ?></b> games since then       
        </td>
	</tr>
</table>

    




