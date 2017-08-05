<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

if (isset($_GET['arrby']) && $_GET['arrby'] == "t") {
	$sql = "SELECT * FROM games ORDER BY game_name ASC ";
	pagination($sql,20);
	
} else if (isset($_GET['arrby']) && $_GET['arrby'] == "i") {
	$sql = "SELECT * FROM games ORDER BY id ASC ";
	pagination($sql,20);
	
} else if(isset($_GET['letter']) || isset($_GET['page'])) {
	$starting_letter = $_GET['letter'];	
	$sql = "SELECT * FROM games WHERE game_name LIKE '".mysql_clean($starting_letter)."%' ORDER BY game_name ASC ";
	pagination($sql,20);
	
} else {
	$sql = "SELECT * FROM games ORDER BY game_name ASC ";
	pagination($sql,20);
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
    <td bgcolor="#e2eaf9"><span class="headdings">The List</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table><br />

<div style="float:right; margin-right:10px;">

<script type="text/javascript"><!--
google_ad_client = "pub-4844596130995747";
/* List Page side ads */
google_ad_slot = "8918180310";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</div>

<table width="690" border="0" cellpadding="7" cellspacing="0" style="margin-left:5px;">

	<tr style="font-weight:bold; background-color:#95b84d; color:#fff;">
        <td width="250">Title</td>
        <td>Added By</td>
        <td>ESRB</td>
        <td>Trailer Link</td>
        <td><span class="categorylink">Rating</span></td>
        <td>Edit</td>
    </tr>

<?php

$sqlquery = mysql_query("SELECT * FROM games") or die("Error connecting to database");

$alphabet = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
echo "<div class=\"alphanumericlinks\">";
echo "Currently, we have ".mysql_num_rows($sqlquery)." games in the database.<br /><br />";
foreach ($alphabet as $letter) {
	echo "<a href=\"{$_SERVER['PHP_SELF']}?action=list&letter=" . $letter . "\">" . $letter . "</a>&nbsp;&nbsp;";
}
echo "<a href=\"{$_SERVER['PHP_SELF']}?action=list\">Show All</a></div><br />";

if ($rows == 0) {
	echo "<tr><td colspan=\"6\">Sorry! No results found.</td></tr>";
} else {
	while ($info = mysql_fetch_array($query)){
		
		$sql_finduser = "SELECT username FROM users WHERE id = '".mysql_clean($info['addedby'])."';";
		$process_userinfo = mysql_query($sql_finduser) or die ("Error connecting to Database");
		$userinfo = mysql_fetch_array($process_userinfo);
		
		echo "<tr class=\"games\">";
		echo "<td><a href =\"{$_SERVER['PHP_SELF']}?action=game&gameid=".$info['id']."\">".$info['game_name']."</a></td>";
		echo "<td><a href =\"index.php?action=viewprofile&uid=".$info['addedby']."\">".$userinfo['username']."</a></td>";
		echo "<td>";
		echo esrbvalue_list($info['esrb']);
		echo "</td>";
		
		if (isset($info['trailer_url']) && $info['trailer_url'] != "") {
			  echo "<td><a href =\"".$info['trailer_url']."\" onClick='return playVid(this)' >Watch a Trailer</a></td>";
		   } else {
			  echo "<td><span style=\"color:#900900; font-weight:bold;\">No Trailer</span></a></td>";
		   } 

		echo "<td>".polling($info['id'])."</td>";
		echo "<td><a href =\"index.php?action=edit&gameid=".$info['id']."\">Edit</a></td>";
		echo "</tr>";
	}
}

?>

</table>

<?php

if(isset($_GET['letter'])) {
	$let="&letter=$starting_letter";
} else {
	$let="";
}


if ($rows != 0) {	
	echo "<br/><div class=\"alphanumericlinks\">";
	if ($page == 1) {
	   echo "<span class='pagenums'>First</span>";
	} else {
	   echo " <a href='{$_SERVER['PHP_SELF']}?action=list&page=1$let&' class='pagenums_sel'>First</a> ";
//	   $prevpage = $page-1;
//	   echo " <a href='{$_SERVER['PHP_SELF']}?page=$prevpage$yes'>Prev</a> ";
	}
	
	for ($pg=1; $pg <= $last; $pg++){	
		if ($page == $pg) {
			echo " <a href='{$_SERVER['PHP_SELF']}?action=list&page=$pg$let' class='pagenums_sel'>$pg</a> ";
		} else {
			echo " <a href='{$_SERVER['PHP_SELF']}?action=list&page=$pg$let' class='pagenums'>$pg</a> ";
		}
	}
	
if ($page == $last) {	
	echo "<span class='pagenums'>Last</span>";
	} else {
//	   $nextpage = $page+1;
//	   echo " <a href='{$_SERVER['PHP_SELF']}?page=$nextpage$yes'>Next</a> ";
	   echo " <a href='{$_SERVER['PHP_SELF']}?action=list&page=$last$let' class='pagenums_sel'>Last</a> ";
	}	
	echo "</div>";
}



?>