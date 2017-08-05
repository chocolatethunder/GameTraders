<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
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
    <td bgcolor="#e2eaf9"><span class="headdings">Sitemap</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table>

<center><img src="images/sitemap.png" border="0" usemap="#Map" />
  <map name="Map" id="Map">
    <area shape="rect" coords="303,26,437,102" href="index.php?action=game&amp;gameid=2" target="_self" />
    <area shape="rect" coords="47,103,197,175" href="index.php?action=bugreport" target="_self" />
    <area shape="rect" coords="47,187,198,280" href="index.php?action=feedback" target="_self" />
    <area shape="rect" coords="47,293,196,366" href="index.php?action=privacytou#tou" target="_self" />
    <area shape="rect" coords="47,382,196,456" href="index.php?action=privacypolicy" target="_self" />
    <area shape="rect" coords="220,246,452,326" href="index.php" target="_self" />
    <area shape="rect" coords="474,209,608,285" href="index.php?action=list" target="_self" />
    <area shape="rect" coords="475,380,607,452" href="index.php?action=learnmore" target="_self" />
    <area shape="rect" coords="457,26,641,103" href="index.php?action=edit&amp;gameid=1" target="_self" />
    <area shape="rect" coords="475,122,607,200" href="index.php?action=addgame" target="_self" />
  </map>
</center>


  