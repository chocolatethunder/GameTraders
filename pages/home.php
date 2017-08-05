<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

?>

<div style="float:right;">

<script type="text/javascript"><!--
google_ad_client = "pub-4844596130995747";
/* Main Page video ad */
google_ad_slot = "3453663952";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<br /><br />

<table width="250" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/g_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#95b84d"></td>
    <td><img src="images/g_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#95b84d"></td>
    <td bgcolor="#95b84d">
    	
        <br /><span class="home_title">10 Latest Games:</span>
    	
        <div style="width:225px; margin:10px;">
        
        <table border="0" width="230">        
        <?php
		
		$sql_topten = "SELECT * FROM games ORDER BY time DESC LIMIT 10;";
		$process_topten = mysql_query($sql_topten) or die ("Error connecting to Database");
		
		while ($get_topten = mysql_fetch_array($process_topten)) {
			
			echo "<tr><td><a href=\"index.php?action=game&gameid=".$get_topten['id']."\" class=\"top_ten\">".$get_topten['game_name']."</a></td>
				  <td><a href =\"".$get_topten['trailer_url']."\" onClick='return playVid(this)' class=\"top_ten_trailer\">Trailer</a></td></tr>";		
			
		}
		
		?>
        </table>
        
        </div>
    
    </td>
    <td bgcolor="#95b84d"></td>
  </tr>
  <tr>
    <td><img src="images/g_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#95b84d"></td>
    <td><img src="images/g_bottomright.png" width="4" height="4" /></td>
  </tr>
</table>
</div>

<div id="s3slider">
   <ul id="s3sliderContent">
   		<?php
		
		$sql_banners = "SELECT * FROM banners ORDER BY id DESC;";
		$process_banners = mysql_query($sql_banners) or die ("Error connecting to Database");
		
		while ($get_banners = mysql_fetch_array($process_banners)) {
			
			echo "<li class =\"s3sliderImage\">
				  <img src =\"".$get_banners['image']."\" />
				  <span><a href=\"".$get_banners['link']."\">".$get_banners['text']."</a></span>
				  </li>";		
			
		}
		
		?>   
   
<!--  <li class="s3sliderImage">
          <img src="images/banner1.png" />
          <span><a href="index.php?action=game&gameid=5">Battlefield Bad Company</a></span>
      </li>-->
      
      <div class="clear s3sliderImage"></div>
   </ul>
</div>

<br />
<div style="width:550px; margin:0px 10px 0px 5px; line-height:1.5em;">
<h2 style="color:#336600;">Hey sup!</h2>

Welcome to GametradersCanada, the place to find all the trade in values for your video games. A community that revolves around user input and user feedback. It's simple. You can find a game of your choice and edit all sorts of information about it. Especially the Trade in Values. Your game isn't on the website? No Problem! Our easy interface lets you add games to our database so that you and other users can add the trade in values to it. Thus, making it simpler for everyone.<br /><br />
Its more than just a game you know, it's your money and several hours wasted if the game is horrendous and during this economical downtime the last thing you want is the least bang for your buck. Look for the community score for each game on the right hand side and see if the community likes it or not. Use the charts to see how often the Trade in Values fluctuate. Then compare them with other stores and other consoles for your personal convenience!<br /><br />
So what are you waiting for go? Go on, get an account, its fast and easy and start putting up some newly discovered Trade in Values for some newly discovered games.

</div>

<br /><br />

<table width="584" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9"></td>
    <td bgcolor="#e2eaf9">
    	
        <br /><span class="home_title">Twitter Feed:</span>
    	
        <div style="width:550px; margin:5px 10px 10px 10px;">
        <ul class="module-list" id="twitter_update_list"></ul>
        <a href="http://twitter.com/Reaktiv" id="twitter-link" style="display:block;text-align:right;">Follow us on Twitter</a>
        <script type="text/javascript" src="http://twitter.com/javascripts/typepad.js"></script>
        <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/Reaktiv.json?callback=twitterCallback2&amp;count=4"></script>
        </div>
    
    </td>
    <td bgcolor="#e2eaf9"></td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table>







  