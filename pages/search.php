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
    <td bgcolor="#e2eaf9"><span class="headdings">Your Search Results</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table><br />

<?php 
	
if (isset($_POST['submitsearch']) ) {

	$search = mysql_clean(trim($_POST['search_game']));
	$searchWords = explode(" ", $search);
	
	if (IDS_check() == true) {
		
		$err_msg .= "<b>Error:</b> Invalid input <br/>";
		
	} else {
		
		if ($_SESSION['searchtime'] > time()) {
		
		$time = unix_todate(($_SESSION['searchtime'] - time()), $format = 's');
		$err_msg = "You must wait $time seconds";
	
		} else {
			
			if (!preg_match($validchars2, $search)) {
				$err_msg .= "Sorry no results for \"".$_POST['search_game']."\"";
			} else {
				
				if (!isset($search) || $search == "" || $search == "Search for a game" || sizeof($searchWords) == 0) {	
					
					$err_msg .= "You didn't search for anything silly";	
				
				} else {
					
					if (strlen($search) >= 4) {
						
						if (strlen($search) <=25) {
							
							  for ($i=0; $i < count($searchWords); $i++) {
							  
							  $searchWords[$i] = mysql_clean($searchWords[$i]);
							  
							  $search_query = "SELECT * FROM games WHERE game_name like '%".mysql_clean($searchWords[$i])."%' ;";
							  $search_result = mysql_query($search_query);
			  
								  if (strlen($searchWords[$i]) > 1 && $searchWords[$i] != "" && $searchWords[$i] != " ") {
								  
									  if (mysql_num_rows($search_result) > 0 ) {
										  
										  $games_found = array();
										  $count = 0;
										  
										  if (mysql_num_rows($search_result) > 0) {
											  
											  while ($game_data = mysql_fetch_array($search_result)) {						
												  $games_found[$count] = array ( "gameid" => $game_data['id'], "game_title" => $game_data['game_name'] );						
												  $count++;	
											  }						
										  }						
									  }
								  }
							  }
					  
							  if (isset($games_found)){
						  
								  echo "<div style =\"margin-left:5px;\"><span style=\"color:#336600; font-weight:bold; font-size:20px; font-family:Arial;\">".sizeof($games_found);					
								  echo (sizeof($games_found) == 1 ? " Game" : " Games");					
								  echo " found:</span> <br/><br/>";
								  echo "<table border=\"0\" cellpadding=\"2\">";
								  
								  foreach ($games_found as $g => $value) {
									  echo "<tr>
											  <td><a href =\"index.php?action=game&gameid=".$games_found[$g]["gameid"]."\">".$games_found[$g]["game_title"]."</a></td>
										  </tr>";
								  }
								  
								  echo "</table></div>";
								  
							  } else {	
								  $err_msg .= "Sorry no results for \"".$_POST['search_game']."\"";
							  }
							  
							  $_SESSION['searchtime'] = time()+7;
						
						} else {
							
							$err_msg .= "Your search is too long";	
						}
						
					} else {
						$err_msg .= "Your search is too short";	
					}
				}		
			}		
		}
	
	}
	
} else {
	
	$err_msg .= "You didn't search for anything silly";
	
}
	
?>
<div id="errorlnk" class="errortext">
<?php
// Display errors here!
   if(isset($err_msg)){
        echo $err_msg;
    }
?>
</div>

