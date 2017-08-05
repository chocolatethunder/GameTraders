<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

?>

  </td>
          <td width="20" background="images/corner_body_right.png"></td>
      </tr>
      <tr>
          <td align="right"><img src="images/corner_bottomleft.png" border="0" /></td>
          <td width="861" background="images/corner_body_bottom.png"></td>
          <td><img src="images/corner_bottomright.png" border="0" /></td>
      </tr>
    </table>
  </div>
  
  <div id="footer">
    <table cellpadding="0" cellspacing="0" border="0" width="910">
      <tr>
          <td align="right"><img src="images/corner_topleft.png" border="0" /></td>
          <td width="861" background="images/corner_body_top.png"></td>
          <td><img src="images/corner_topright.png" border="0" /></td>
      </tr>
      <tr>
          <td width="23" background="images/corner_body_left.png" align="right"></td>
          <td bgcolor="#FFFFFF">

            <ul id="footnav">
            	<li><a href="index.php?action=addgame">Add Game</a></li>
                <li><a href="index.php?action=learnmore">Learn More</a></li>
                <?php if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) { ?>
                <li><a href="index.php?action=newuser">Sign up</a></li>
                <?php } ?>
                <li><a href="index.php?action=list">Games</a></li>
                
                <li><a href="index.php?action=bugreport">Report a bug</a></li>
                <li><a href="index.php?action=feedback">Feedback</a></li>
                <li><a href="index.php?action=privacypp">Privacy Policy</a></li>
                <li><a href="index.php?action=privacytou#tou">Terms of Use</a></li>
                <li><a href="index.php?action=sitemap">Sitemap</a></li>
            </ul>
            
            <br />
            <img src="images/logo1.png" style="float:right; margin-top:10px;" border="0" />
            <div style="width:700px; color:#999; margin-left:5px;">&copy; GametradersCanada <?php echo unix_todate(time(), $format = 'Y'); ?>. <a href="#">All Rights Reserved. </a><br /><br />This is a property of GametradersCanada. All the graphics, logos, designs, icons, scripts, and other services and their names belong to GametradersCanada and Reaktiv Media Inc. All the graphics, logos and trailers related to a game or console are a property of their respective publishers and companies and are subjective to their own copyrights.</div>
                     
</td>
          <td width="20" background="images/corner_body_right.png"></td>
      </tr>
      <tr>
          <td align="right"><img src="images/corner_bottomleft.png" border="0" /></td>
          <td width="861" background="images/corner_body_bottom.png"></td>
          <td><img src="images/corner_bottomright.png" border="0" /></td>
      </tr>
    </table>
    <br />
  </div>
</div>

</body>
</html>