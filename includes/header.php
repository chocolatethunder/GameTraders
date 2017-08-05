<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="game, video, games, video games, trade, traders, trade-in, tradein, trade in values, sony, nintendo, microsoft, xbox, 360, playstation, wii, gamecube, pc, eb games, futureshop, block, buster"  />
<meta name="description" content="Gametraders is a place for people looing for trade in values of their video games!" />

<link href="stylesheets/stylesheet.css" type="text/css" rel="stylesheet" media="all" />
<link rel="icon" href="favicon.gif" type="image/gif" >

<script type="text/javascript" src="javascript/jquery.js"></script>
<?php 
if (!isset($check_page['page'])) {	
	echo "<script type=\"text/javascript\" src=\"javascript/jQuerySlider.js\"></script>";
	echo "
	<script>
	  $(document).ready(function() {
		 $('#s3slider').s3Slider({
			timeOut: 10000
		 });
	  });
	</script>";
}
?>
<script type="text/javascript" src="javascript/videopopup.js"></script>
<script type="text/javascript" src="javascript/javascript.js"></script>
<script type="text/javascript" src="javascript/charts.js"></script>

<!--<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7334594-1");
pageTracker._trackPageview();
} catch(err) {}</script>-->

<title>Gametraders Canada - Your source for Video Game Trade in Values</title>
</head>

<?php 

if ($check_page['page'] == "addgame" || $check_page['page'] == "edit") {	
	echo "<body onload=\"uncheckall()\">";
} else {
	echo "<body>";
}
	
?>

<!-- HEADDER -->
<div id="container">
    
	<!--<div style="color:#96b8f8; margin-left:800px; font-weight:bold; font-size:12px;">Region: <span style="color:#C30">Canada</span></div>-->
    
    <table cellpadding="0" cellspacing="0" width="907" border="0">
        <tr>
          <td width="502" height="110" background="images/banner_left.png"><a href="index.php" class="gt_name"><img src="images/gt_name_hover.png" border="0" style="display:none" alt="Welcome Canadian Gamers" /></a></td>
          <td width="400" height="110" background="images/banner_body.png" align="right">
          
          <?php
		  if ($_SESSION['userid'] != 0 || $_SESSION['username'] != "" || $_SESSION['logged'] != false) {
			  
			  	$sql = "SELECT username, avatar FROM users WHERE id = '".mysql_clean($_SESSION['userid'])."';";
				$process = mysql_query($sql) or die ("Error connecting to database");
				
				$userdata = mysql_fetch_array($process);
	
			?>
            <table border="0" cellpadding="2" cellspacing="0">
            <tr valign="middle">
            	<td align="right"><span style="font-size:12px; color:#FFF; font-weight:bold;"><?php echo "Welcome, ".$userdata['username'] ?><br /><br />
               <a href="index.php?action=account"><span <?php if (isset($check_page['page']) && $check_page['page'] == "account") {echo "style=\"color:#336600;\"";} else {echo "style=\"color:#ffffff;\"";} ?>><img src="images/account_but.png" width="91" height="25" border="0" /></span></a>
               <a href="index.php?action=logout"><span <?php if (isset($check_page['page']) && $check_page['page'] == "logout") {echo "style=\"color:#336600;\"";} else {echo "style=\"color:#ffffff;\"";} ?>><img src="images/logout_but.png" width="91" height="25" border="0" /></span></a></span>
                
                
                </td>
                <td></td>
                <td>
                	<table width="50" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="images/avatar_topleft.png" width="5" height="5" /></td>
                        <td width="100%" bgcolor="#ffffff"></td>
                        <td><img src="images/avatar_topright.png" width="5" height="5" /></td>
                      </tr>
                      <tr>
                        <td bgcolor="#ffffff">&nbsp;</td>
                        <td bgcolor="#ffffff"><img src="<?php echo $userdata['avatar']; ?>" width="50" height="50" border="0"  /></td>
                        <td bgcolor="#ffffff">&nbsp;</td>
                      </tr>
                      <tr>
                        <td><img src="images/avatar_bottomleft.png" width="5" height="5" /></td>
                        <td bgcolor="#ffffff"></td>
                        <td><img src="images/avatar_bottomright.png" width="5" height="5" /></td>
                      </tr>
                    </table>
                </td>
            </tr>
            </table>        
            
            
            <?php
			  
		  } else {
		  
			  if ($check_page['page'] != "login") {
				  $logintoken = md5(uniqid(rand(), true));
				  $_SESSION['logintoken'] = $logintoken;
			  ?>			
				 
			  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=login" method="post" id="loginarea" name="login">
			  
			  User:&nbsp;<input type="text" name="username" class="userbox" />
			  Pass:&nbsp;<input type="password" name="password" class="userbox" />
			  <br />
              <input type="checkbox" name="rememberme" value="Remember Me" /> Remember Me &nbsp;
			  <input type="button" onClick="parent.location='index.php?action=newuser'" value="Sign Up" class="signup_but" />
			  <input type="submit" name="submitlogin" value="Login" class="login_but" />
			  
			  <input type="hidden" name="logintoken" value="<?php echo $logintoken; ?>" />
						
			  </form>
	<?php }
		  }?>
          </td>
          <td width="15" height="110" background="images/banner_right.png"></td>
        </tr>
    </table>

<!-- SEARCH AREA -->
    <table cellpadding="0" cellspacing="0" border="0" width="910">
    <tr>
        <td background="images/search_left.png" width="23" height="107"></td>
        <td background="images/search_body.png" width="868" height="107">
        <center>
        <form action="index.php?action=search" method="post" id="searcharea" name="search">
            <input type="text" name="search_game" class="searchbox" value="Search for a game" onfocus="this.value=''"/>&nbsp;
            <input type="hidden" name="submitsearch" value="SEARCH" />
            <input type="submit" value="SEARCH" class="search_but" />
        </form>
        </center>
        </td>
        <td background="images/search_right.png" width="19" height="107"></td>
    </tr>
    </table>

<!--insert google adsense image banner here-->
<!--<div style="margin-bottom:10px;"></div>-->

<!-- NAVIGATION -->
    
    <div id="navarea">
      <table width="910" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="images/nav_topleft.png" width="22" height="6" /></td>
        <td width="100%" bgcolor="#96b8f8"></td>
        <td><img src="images/nav_topright.png" width="19" height="6" /></td>
      </tr>
      <tr>
        <td background="images/nav_left.png" width="22"></td>
        <td bgcolor="#96b8f8">
        
        <div id="navbutn">
          <ul class="navigation">
          <li><a href="index.php"><div <?php if (isset($check_page['page']) && $check_page['page'] == "" || !isset($check_page['page']) ) {echo "class=\"menu_wrapper_selected\"";} else {echo "class=\"menu_wrapper\"";} ?>>Main</div></a></li>
          <li><a href="index.php?action=addgame"><div <?php if (isset($check_page['page']) && $check_page['page'] == "addgame") {echo "class=\"menu_wrapper_selected\"";} else {echo "class=\"menu_wrapper\"";} ?>>Add Game</div></a></li>
          <li><a href="index.php?action=list"><div <?php if (isset($check_page['page']) && $check_page['page'] == "list") {echo "class=\"menu_wrapper_selected\"";} else {echo "class=\"menu_wrapper\"";} ?>>Games</div></a></li>
          <li><a href="index.php?action=learnmore"><div <?php if (isset($check_page['page']) && $check_page['page'] == "learnmore") {echo "class=\"menu_wrapper_selected\"";} else {echo "class=\"menu_wrapper\"";} ?>>Learn More</div></a></li>
          
          <?php if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) { ?>
          
          <li><a href="index.php?action=newuser" style="margin-left:480px;"><div <?php if (isset($check_page['page']) && $check_page['page'] == "newuser") {echo "class=\"menu_wrapper_selected\"";} else {echo "class=\"menu_wrapper\"";} ?>>Sign Up</div></a></li>
          <li><a href="index.php?action=login"><div <?php if (isset($check_page['page']) && $check_page['page'] == "login") {echo "class=\"menu_wrapper_selected\"";} else {echo "class=\"menu_wrapper\"";} ?>>Login</div></a></li>
          </ul>
          <?php } ?>
        </div>
        
        </td>
        <td background="images/nav_right.png" width="19"></td>
      </tr>
      <tr>
        <td><img src="images/nav_bottomleft.png" width="22" height="6" /></td>
        <td bgcolor="#96b8f8"></td>
        <td><img src="images/nav_bottomright.png" width="19" height="6" /></td>
      </tr>
      </table>
     </div>
            
    <div id="webpage">
    <table cellpadding="0" cellspacing="0" border="0" width="910">
      <tr>
          <td width="23" align="right"><img src="images/corner_topleft.png" border="0" /></td>
          <td width="861" background="images/corner_body_top.png"></td>
          <td width="20"><img src="images/corner_topright.png" border="0" /></td>
      </tr>
      <tr>
          <td width="23" background="images/corner_body_left.png" align="right"></td>
          <td bgcolor="#FFFFFF" class="mainbodytable">
