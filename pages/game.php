<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

if (isset($_GET['page'])){
	$show = 1;
	echo "<script type=\"text/javascript\">var currLayerId = \"comments\";</script>";
}


$gameinfo = mysql_fetch_array($query);

$sql = "SELECT username, avatar FROM users WHERE id = '".mysql_clean($gameinfo['addedby'])."';";
$process_userinfo = mysql_query($sql) or die ("Error connecting to Database");
$userinfo = mysql_fetch_array($process_userinfo);

// comments form proccessing
if (isset($_POST['submit_comments'])) {
	
	$userid = mysql_clean($_SESSION['userid']);
	$gameid = mysql_clean($gameinfo['id']);
	$time = time();
	
	if (!isset($_POST['game_comments']) || $_POST['game_comments'] == "") {
		
		$err_msg = "Whats this? You have nothing to say? Well thats not going to work! Try putting in some text";
		echo "<script type=\"text/javascript\">var currLayerId = \"comments\";</script>";
		$show = 1;
		$error = 1;
		
	} else {
		
		$comment = mysql_clean(htmlspecialchars($_POST['game_comments']));
		
	}
	
	
	if (!isset($error) || $error != 1) {
	
		$sql_commentinsert = "INSERT INTO comments (userID, gameID, comment, time) VALUES ('".$userid."','".$gameid."','".$comment."','".$time."');";
		
		if (mysql_query($sql_commentinsert)) {
			$show = 1;
			echo "<script type=\"text/javascript\">var currLayerId = \"comments\";</script>";
			$err_msg = "Comment successfully posted";
		} else {
			$err_msg = "Comment failed to post! Clearly Saurabh is at fault";
		}
		
	}
	
}

// retrieve comments from the database
$sql_getcomments = "SELECT * FROM comments WHERE gameID = '".$gameinfo['id']."' ORDER BY id DESC ";
pagination($sql_getcomments,10);

//pageviews unique
$remote_ip = $_SERVER['REMOTE_ADDR'];
$sql_pageviews = "SELECT * FROM pageviews WHERE ip='".mysql_clean($remote_ip)."' AND gameID='".mysql_clean($id)."' ;";
$pageviews_process = mysql_query($sql_pageviews) or die ("Error connecting to Database");

if (mysql_num_rows($pageviews_process) == 0) {
	$sql_newpageview = "INSERT INTO pageviews(gameID, ip) VALUES('".mysql_clean($id)."', '".mysql_clean($remote_ip)."')";
	$process_newpageview = mysql_query($sql_newpageview) or die ("Error connecting to Database");
}

//report game
$userid = mysql_clean($_SESSION['userid']);
$sql_reportgame = "SELECT * FROM reported WHERE userID = '".$userid."' AND gameID = '".mysql_clean($id)."';";

if (isset($_POST['reportgame'])) {
	
	$process_reportgame = mysql_query($sql_reportgame) or die ("Error connecting to Database");
	
	if (mysql_num_rows($process_reportgame) == 0) {
		$sql_newreport = "INSERT INTO reported (gameID, userID) VALUES('".mysql_clean($id)."', '".$userid."');";
		$process_newreport = mysql_query($sql_newreport) or die ("Error connecting to Database");
	}
	
}

//function to check if user has already reported the game
$process_reportgame = mysql_query($sql_reportgame) or die ("Error connecting to Database");

if (mysql_num_rows($process_reportgame) > 0) {
	$user_reported = 1;
}


//Fake determining algorithm
$sql_totalreported = "SELECT * FROM reported WHERE userID = '".$userid."' AND gameID = '".mysql_clean($id)."';";
$process_totalreported = mysql_query($sql_totalreported) or die ("Error connecting to Database");
$totalreported = mysql_num_rows($process_totalreported);

$sql_totalviews = "SELECT * FROM pageviews WHERE gameID = '".mysql_clean($id)."';";
$process_totalviews = mysql_query($sql_totalviews) or die ("Error connecting to Database");
$totalviews = mysql_num_rows($process_totalviews);

if ($totalreported < 5) { // wont acknowledge untill 5 people have reported it
	$totalreported = 25;
}

if ($totalviews < 20) { // wont acknowledge untill 20 people have viewed it
	$totalviews = 100;
}

$ratio = $totalreported/$totalviews;

if ($ratio > 0.5) {
	$fake = 1;
}

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:5px;">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9">
          <ul id="edit">
          <li><a href="index.php?action=edit&gameid=<?php echo $gameinfo['id'] ?>">Edit</a></li>
          </ul>
    <span class="headdings">Your Game</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
  
  <?php    if(isset($fake) && $fake == 1){ ?>
  <tr>
  	<td></td>
    <td align="center">
    	<table width="350" border="0" cellpadding="0" cellspacing="0">
           <tr>
            <td colspan="3" background="images/subheadshadow.png" height="5"></td>
           </tr>
          <tr>
            <td bgcolor="#fbc580">&nbsp;</td>
            <td width="100%" bgcolor="#fbc580">
            
            <div class="report_warning">
            
            <table cellpadding="0" cellspacing="0" border="0">
            	<tr align="left">
                	<td rowspan="2"><img src="images/report_logo.png" width="27" height="25" border="0" /></td>
                    <td>&nbsp;&nbsp;</td>
                    <td><b>WARNING:</b> This game has been reported fake! Take caution with the game related data.</td>
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
        </table>    
    </td>
    <td></td>
  </tr>
  <?php  } ?>
  
</table>

<table width="260" border="0" cellpadding="0" cellspacing="0" style="float:right;margin-top:5px;">

	<form action="index.php?action=game&gameid=<?php echo $gameinfo['id'] ?>" method="post">
    <tr>
    	<td colspan="5">
        
        	 <table width="255" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:10px;">
              <tr>
                <td></td>
                <td width="100%"></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                
                <?php if (mysql_num_rows($process_userinfo) > 0) {?>
                	
                    <table border="0" cellpadding="1" cellspacing="0">
                    	<tr>
                        	<td rowspan="3"><a href="index.php?action=viewprofile&uid=<?php echo $gameinfo['addedby']; ?>"><img src="<?php echo $userinfo['avatar']; ?>" width="50" height="50" /></a></td>
                            <td>&nbsp;</td>
                            <td><span style="font-size:10px;">Added by:</span></td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td><a href="index.php?action=viewprofile&uid=<?php echo $gameinfo['addedby']; ?>"><span style="font-size:13px; font-weight:bold;"><?php echo $userinfo['username']; ?></span></a></td>
                            <td></td>
                        </tr>
                        <tr>
                        	<td></td>
                        	<td><span style="font-size:10px;">on:</span> <b><?php echo unix_todate($gameinfo['time'], $format = 'M d, Y'); ?></b></td>
                        </tr>
                    </table>
                    
                    <?php } else { ?>
                    
                    <table border="0" cellpadding="1" cellspacing="0">
                    	<tr>
                        	<td rowspan="3"><a href="index.php?action=viewprofile&uid=1"><img src="images/avatars/craeyon.png" width="50" height="50" /></a></td>
                            <td>&nbsp;</td>
                            <td><span style="font-size:10px;">Added by:</span></td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td><a href="index.php?action=viewprofile&uid=1"><span style="font-size:13px; font-weight:bold;">saurabh</span></a></td>
                            <td></td>
                        </tr>
                        <tr>
                        	<td></td>
                        	<td><span style="font-size:10px;">on:</span> Unavailable</td>
                        </tr>
                    </table>
                    
                    <?php } ?>
                    
                </td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
            
        </td>
    </tr>
    <tr align="center">
   		<td rowspan="2"><?php esrbvalue($gameinfo['esrb']) ?></td>
        <td>&nbsp;</td>
  		<td colspan="3"><div id="rating"><span class="rating"><?php echo polling($id); ?></span><br />out of 100</div></td>
    </tr>
    <tr align="center">
      	<td>&nbsp;</td>
        
        <?php if(votingallow($id) == 1) { ?>
        
        <td height="46" valign="top"><img src="images/score_yay_null.png" width="72" height="46" border="0" style="margin-left:2px;" /></td>
      	<td height="46" valign="top" align="left"><img src="images/score_nay_null.png" width="73" height="46" border="0" /></td>
        
        <?php } else { ?>       
        
      	<td><input type="submit" class="rating_yes" name="like" value="&nbsp;" /></td>
      	<td><input type="submit" class="rating_no" name="dislike" value="&nbsp;" /></td>
        
        <?php } ?>
        
    </tr>

</form>
	<tr>
    	<td>&nbsp;
        
        </td>
    </tr>
	<tr>
    	<td colspan="4">
        	<script type="text/javascript"><!--
			google_ad_client = "pub-4844596130995747";
			/* 234x60, created 1/2/09 */
			google_ad_slot = "7072114598";
			google_ad_width = 234;
			google_ad_height = 60;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
        </td>
    </tr>
         

</table>


<table width="590" border="0" cellpadding="3" cellspacing="0">

 	<tr>
      <td valign="top" colspan="3"><h1 class="gametitle"><?php echo $gameinfo['game_name'] ?></h1></td>
  	</tr>
	<tr>
	  <td valign="top" colspan="3"><div style="margin-left:1px;"><?php displayconsoles(); ?></div></td>
	</tr>
    <tr>
     <td></td>
    </tr>
	<tr>
      <td width="150" valign="top"><img src="<?php echo $gameinfo['image_url'] ?>" width="150" height="205"/><br />
          <center>
          <table border="0" cellpadding="0" cellspacing="1" style="margin-top:10px;">
          <tr>
          <?php if (isset($gameinfo['trailer_url']) && $gameinfo['trailer_url'] != "") {?>
              <td><a href="<?php echo $gameinfo['trailer_url'] ?>" onClick='return playVid(this)'><img src="images/watch_trailer.png" border="0" title="Watch a trailer for this game" /></a></td>
          <?php } else { ?>
              <td><img src="images/watch_trailer_null.png" border="0" /></td>
          <?php } ?>                                    
          
          <form action="index.php?action=game&gameid=<?php echo $gameinfo['id'] ?>" method="post">
          <?php 
		  
		  if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) { 
			  
			  echo "<td><a href=\"index.php?action=login\"><img src=\"images/report_fake_login.png\" border=\"0\" class=\"report\" title=\"Login to report this game\" /></a></td>";
			  
		  } else {
			  
			  if ($user_reported == 1) {
				  
				  echo "<td><img src=\"images/report_fake_null.png\" border=\"0\" class=\"report\" title=\"Report this game\" /></td>";
				  
			  } else {
				  
				  echo "<td><input type=\"submit\" class=\"report_fake\" value=\"&nbsp;\" name=\"reportgame\" /></td>";
				  
			  }
			  
		  }
			  
		  ?>
          </form>
          
          </tr>
          </table>                                                                   
          </center></td>
      <td></td>
	  <td valign="top"><div id="tiv"><div id="prop"></div>
      
      	<table border="0" width="390" cellpadding="5" cellspacing="0" style="margin-top:5px; margin-left:auto; margin-right:auto;">
        	<tr>
            	<td>&nbsp;</td>
                <td><strong>Futureshop</strong></td>
                <td><strong>EB Games</strong></td>
                <td><strong>BlockBuster</strong></td>
            </tr>
            <?php displayconsoles_intable() ?>
        </table>
      <div id="clear"></div>
      </div></td>
	</tr>
</table><br />


<div style="margin-left:2px;">

<a href="" id="chartsbutt" onclick="toggleLayer('charts');return false;" onmouseover="image1.src='images/charts_button_sel.png'" onmouseout="image1.src='images/charts_button.png'">
<img name="image1" src="images/charts_button.png" border="0" title="Show Charts" /></a>

<a href="" id="commentsbutt" onclick="toggleLayer('comments');return false;" onmouseover="image2.src='images/comments_button_sel.png'" onmouseout="image2.src='images/comments_button.png'">
<img name="image2" src="images/comments_button.png" border="0" title="Show Comments" /></a>

<a href="" id="commentsbutt" onclick="toggleLayer(null);return false;" onmouseover="image3.src='images/hideall_button_sel.png'" onmouseout="image3.src='images/hideall_button.png'">
<img name="image3" src="images/hideall_button.png" border="0" title="Hide All" /></a>

</div>

<br />

<div id="charts" <?php if ($show == 1) { echo "style=\"display:none;\""; } else { echo ""; }?>>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Charts</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table><br />

<table border="0" width="100%" align="center">
	<tr>
    	<td><?php displayconsoles_chart(); ?></td>
    </tr>
	<tr>        
    	<td align="center">
        
        <?php
		
			//require_once("charts/charts.php");
			
			//echo InsertChart( "charts/charts.swf", "charts/charts_library", "charts/chartdata.php?gameID=".$gameinfo['id']."&consoleID=".$_GET['c']."&uniqueID=".uniqid(rand(),true)."", 845, 300);
			
			//echo "<br><br>";
			
			echo "<img src=\"chartdata/chart.php?gameID=".$gameinfo['id']."&consoleID=".$_GET['c']."&storeID=".$_GET['s']."\">"; 

			
		?>

        
		</td>
    </tr>
</table>
</div>

<div id="comments" <?php if ($show == 1) { echo ""; } else { echo "style=\"display:none;\""; }?>>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Comments</span></td>
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
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
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



<table border="0" width="500" cellpadding="5" style="margin-left:5px; table-layout:fixed;">
	<?php 
	
	if (mysql_num_rows($query) == 0) {
		
		echo "<tr><td colspan =\"2\">";
		echo "<b>What?! No comments? There has been a failure on the Webernets!</b>";
		echo "</td></tr>";
		
	} else {		
		
		$commentsinfo = $query;
		
		while ($commentdata = mysql_fetch_array($commentsinfo)){
			
			$sql_comment_user = "SELECT username, avatar FROM users WHERE id = '".$commentdata['userID']."' ;";
			$user_payload = mysql_query($sql_comment_user) or die ("Error connecting to database");
			$userdata = mysql_fetch_array($user_payload);
			
			echo "<tr valigh=\"top\"><td width=\"150\">";
			echo "<a href=\"index.php?action=viewprofile&uid=".$commentdata['userID']."\"><img src =\"".$userdata['avatar']."\" border=\"0\" width \"25\" height=\"25\" class=\"avatar_logo\" />&nbsp;<b>".$userdata['username']."</b></a><br />&nbsp;<span style=\"font-size:10px; color:#999999;\">"
			.time_since($commentdata['time'])." ago</span>";
			echo "</td><td>";
			echo preg_replace('/([a-zA-Z]{25})(?![^a-zA-Z])/', '$1 ', $commentdata['comment']);
			echo "</td></tr>";
			//echo "<tr><td colspan=\"2\">&nbsp;</td></tr>";
			
		}
		
			echo "<tr><td colspan=\"2\">";
			
			if ($rows != 0) {	
				echo "<br/><div>";
				if ($page == 1) {
				    echo "<span class='pagenums'>First</span>";
				} else {
				   echo " <a href='{$_SERVER['PHP_SELF']}?action=game&gameid=".$id."&page=1#comments' class='pagenums_sel'>First</a> ";
			//	   $prevpage = $page-1;
			//	   echo " <a href='{$_SERVER['PHP_SELF']}?page=$prevpage$yes'>Prev</a> ";
				}
				
				for ($pg=1; $pg <= $last; $pg++){	
					if ($page == $pg) {
						echo " <a href='{$_SERVER['PHP_SELF']}?action=game&gameid=".$id."&page=$pg#comments' class='pagenums_sel'><u>$pg</u></a> ";
					} else {
						echo " <a href='{$_SERVER['PHP_SELF']}?action=game&gameid=".$id."&page=$pg#comments' class='pagenums'>$pg</a> ";
					}
				}
				
			if ($page == $last) {	
				echo "<span class='pagenums'>Last</span>";
				} else {
			//	   $nextpage = $page+1;
			//	   echo " <a href='{$_SERVER['PHP_SELF']}?page=$nextpage$yes'>Next</a> ";
				   echo " <a href='{$_SERVER['PHP_SELF']}?action=game&gameid=".$id."&page=$last#comments'>Last</a> ";
				}	
				echo "</div>";
			}
			
			echo "</td></tr>";
		
	}
	
	?>    
    
	<tr>
    	<td colspan="2">
        <hr width="400" noshade="noshade" align="left" color="#cccccc" />
        
		<?php if ($_SESSION['userid'] != 0 || $_SESSION['username'] != "" || $_SESSION['logged'] == true) { ?>
        
        <form action="index.php?action=game&gameid=<?php echo $gameinfo['id'] ?>" method="post">
        
            Enter some nice and thoughtful comments:<br /><br />
            <textarea name="game_comments" style="width:325px; height:125px;"></textarea>
            <br />
            <input type="submit" name="submit_comments" value="Submit Comment" class="bodybutn" />
            
        </form>
       
        
        <?php } else {
			
			echo "<br /><span style=\"font-size:20px; margin-bottom:3px;\">You must login or sign up to post a comment!</span>
				  <br /><span style=\"font-size:11px; color:#666666\">We promise not to send you natural male enhancements</span>";
			
			} ?>
        </td>
    </tr>
	
</table>
<br />
</div>
