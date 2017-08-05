<?php 

include("../includes/connection.php");
include("../includes/functions.php");

//$price_store = array("bb","eb","fs");
//$price_cons = array("pc","xbox360","ps3","wii","xbox","ps2","gc","ds","psp");
////$price = array("14.00","14.00","14.00","14.00","14.00","14.00","14.00","14.00","14.00");
//
//
//
//foreach ($price_cons as $i) {
//	
//	foreach ($price_store as $k) {	
//		$tivalue = $i."_".$k."<br/>";		//echo "UPDATE $i SET $k = 'value' WHERE id = gameID LIMIT 1;<br>";
//		echo $tivalue;
//		//$lala .= "$k, ";
//		
//	}
//	$haha .= "'$tivalue', ";
//	echo "<br>";
////	echo "INSERT INTO tiv ($lala"."time,gameID) VALUES ($haha".unix_todate(time(), $format ='d M Y').", gameID);";
////	echo "<br><br>";
//
//}
//
//echo "<br>";
//
//
//function unix_todate($timestamp, $format = 'd m Y') {
//   return date($format, $timestamp);
//}
//
//
//
//echo unix_todate(time(), $format ='d M Y');

//				$nameofgame = "fable 2";
//				
//				$gamecheck = mysql_query("SELECT * FROM games WHERE game_name =\"".$nameofgame."\";");
//				
//				if ($gamecheck > 0) {
//					
//					$getgameid = mysql_fetch_array($gamecheck);
//					
//					$err_msg = "The game ".$getgameid['game_name']." already exists. Go <a href = \"game.php?gameid=".$getgameid['id']."\">here</a> to see the game's details.";
//					
//					echo $err_msg;
//					
//				} else {
//					
//					echo "failed";
//				}
					


//foreach ($price_store as $j) {
	//mysql_query( "INSERT INTO $j ($lala"."time,gameID) VALUES ('14.00','14.00','14.00','14.00','14.00','14.00','14.00','14.00','14.00','".time()."',1);" );
	//echo mysql_error()."<br>";
//}


//				$query2="SELECT * FROM tiv_eb_games WHERE gameID = 1 ORDER BY id DESC LIMIT 0,1;";
//				
//				if (mysql_query($query2)){
//					$game = mysql_fetch_array(mysql_query($query2));
//					echo $game['id']."&nbsp;".$game['pc']."&nbsp;".$game['ps3'];
//				} else {
//					$error = "We have an error";
//				}


//				$nameofgame = "Call of Duty 4";
//				
//				$exploded_keywords = explode(" ", trim($nameofgame));
//				$total_keywords = count($exploded_keywords)-1;
//				
//				$sql_query = "SELECT * FROM games WHERE game_name like ";
//							
//							// loop here
//							
//							foreach ($exploded_keywords as $keyword) {									
//									echo $keyword;
//									$i++;
//									$sql_query .= "'%".$keyword."%' ";
//									
//									if ($i <= $total_keywords) {
//										$sql_query .= "OR game_name like ";
//									}
//									
//							}
//							
//					$sql_query .=";";
//					
//					echo "<br>";
//					echo $sql_query;

//						$nameofgame = "Battlefield: Bad Company";
//						$imageurl = "lol";
//						$videourl = "lalala";
//						$console = "1,2,3";
//						
//						$clean_name = str_replace(":","",$nameofgame);
//						
//
//						$query="INSERT INTO games(game_name,image_url,trailer_url,esrb,consoles) VALUES('".$nameofgame."','".$imageurl."','".$videourl."','".$esrbrating."','".$console."');";
//						
//						$check_query = mysql_query("SELECT * FROM games WHERE game_name like '%".$clean_name."%';");
//						$check_rows = mysql_num_rows($check_query);
//						
//						if ($check_rows > 0) {
//							echo "Game already exists".$check_query['game_name']." ";
//						} else {
//							
//							echo "good to go";
//						}
						
						//$request = mysql_query($check_query);
//						$numresults = mysql_num_rows($request);
//						$row_count = 0;
//						$checkname = "'%".$nameofgame."%'";
//						
//						while ($row_count < $numresults) {
//							$game_name = mysql_fetch_array($request);
//							$row_count++;
//						
//						if ($game_name['game_name'] == $checkname) {
//							echo "error";
//						}
//						}



//$shop = array( array("Platforms", "Futureshop" , "EB Games"),
//			   array("PC", 1.25 , 15),
//               array("Xbox360", 0.75 , 25),
//               array("PS3", 1.15 , 7) 
//             ); 
//
//
//echo "<table border=0 cellpadding=4>";
//for ($row = 0; $row < 4; $row++)
//{
//    //echo "<tr><td colspan=3><b>The row number $row</b></td></tr>";
//	echo "<tr>";
//    for ($col = 0; $col < 3; $col++)
//    {
//        echo "<td>".$shop[$row][$col]."</td>";
//    }
//	
//	echo "</tr>";
//
//}
//echo "</table>";

//$PC[fs] = $_POST['fs_pc'];
//$PC[eb] = $_POST['fs_eb'];
//$PC[bb] = $_POST['fs_bb'];


//$sql_query = "INSERT INTO tiv (console,fs,bb,eb,time) VALUES ('fs_pc','bb_pc','eb_pc','".time()."'), ('fs_xbox360','bb_xbox360','eb_xbox360','".time()."');";
//
//$consoles = array ( "PC" => array ("fs" => array ("store" => "fs", "tiv" => 22.50), 
//				  				   "eb" => array ("store" => "eb", "tiv" => 23.50),
//								   "bb" => array ("store" => "bb", "tiv" => 21.00)),
//				    "XBOX 360" => array ("fs" => array ("store" => "fs", "tiv" => 21.00), 
//				  				         "eb" => array ("store" => "eb", "tiv" => 22.00),
//								         "bb" => array ("store" => "bb", "tiv" => 30.00)),
//				    "Playstation 3" => array ("fs" => array ("store" => "fs", "tiv" => 32.10), 
//				  				             "eb" => array ("store" => "eb", "tiv" => 33.10),
//								        	 "bb" => array ("store" => "bb", "tiv" => 52.00)),
//				    "Nintendo Wii" => array ("fs" => array ("store" => "fs", "tiv" => 19.00), 
//				  				        	 "eb" => array ("store" => "eb", "tiv" => 12.10),
//								        	 "bb" => array ("store" => "bb", "tiv" => 16.00)),
//				   );
//
//foreach ($consoles as $tiv){
//	foreach ($tiv as $love => $value) {		
//		echo $value["store"]."&nbsp;".$tiv[$love]["tiv"]."<br>";
//	}
//	echo "<br>";
//}

//$sqlinsertquery = "INSERT INTO tivs (gameID, console, bb, eb, fs, time) VALUES ";
//
//         $cons = array("pc","xbox360","ps3","wii","xbox","ps2","gc","ds","psp");		 
//         $titl = array("PC ","XBOX 360 ","Playstation 3 ","Nintendo Wii ","XBOX ","Playstation 2 ","Gamecube ","Nintendo DS ","Playstation Portable ");		 
//         $flds = array("bb","eb","fs");
//         
//         for ($h=0; $h<=8; $h++) {
//			
//			$console_name = "$flds[0]_$cons[$h]";
//			$console_name_1 = "$flds[1]_$cons[$h]";
//			$console_name_2 = "$flds[2]_$cons[$h]";
//			
//			if (isset($console_tiv) || isset($console_name_1) || isset($console_name_2) ) {					
//										
//				//for ($g=0; $g<=2; $g++){
//					
//					//echo "$flds[$g]_$cons[$h]<br>";
//					//$console_name = "$flds[$g]_$cons[$h]";
//	
//					
//					$console_tiv = str_replace("$", "" , $_GET[$console_name]);
//					$console_tiv_1 = str_replace("$", "" , $_GET[$console_name_1]);
//					$console_tiv_2 = str_replace("$", "" , $_GET[$console_name_2]);
//					
//					
//													 
//					if (isset($console_tiv) && $console_tiv != "" && $console_tiv != "$" && is_numeric($console_tiv)){						
//						$sqlinsertquery .= "('2', '$titl[$h]', ";	
//						//echo $console_tiv."<br>";
//						$sqlinsertquery .= "'$console_tiv', ";											  
//					}
//					
//					if (isset($console_tiv_1) && $console_tiv_1 != "" && $console_tiv_1 != "$" && is_numeric($console_tiv_1)){						
//						//echo $console_tiv."<br>";
//						$sqlinsertquery .= "'$console_tiv_1', ";											  
//					}
//					
//					if (isset($console_tiv_2) && $console_tiv_2 != "" && $console_tiv_2 != "$" && is_numeric($console_tiv_2)){						
//						//echo $console_tiv."<br>";
//						$sqlinsertquery .= "'$console_tiv_2', ";	
//						$sqlinsertquery .= "time()), ";											  
//					} else {
//						$sqlinsertquery .= "'00.00', ";
//						$sqlinsertquery .= "time()), ";	
//					}
//
//					
//					
//				//}
//				
//			}
//			 
//						//echo "<br><br>";
//         }
//		 
//		 
//		echo $sqlinsertquery;



//$cons = array("pc","xbox360","ps3","wii","xbox","ps2","gc","ds","psp");		 
//$titl = array("PC ","XBOX 360 ","Playstation 3 ","Nintendo Wii ","XBOX ","Playstation 2 ","Gamecube ","Nintendo DS ","Playstation Portable ");		 
//$flds = array("bb","eb","fs");
//
//for ($h=0; $h<=8; $h++) {							
//							  
//	  for ($g=0; $g<=2; $g++){
//		  
//		 $console_c = $flds[$g]."_".$cons[$h];
//		 echo $console_c."<br>";
//		 $console_v = str_replace("$", "", $_GET[$console_c]);
//		 echo $console_v."<br>";
//	  
//  	}
//}


//$count = 0;
//$tivcount = 0;
//$tiv = array();
//
//$fs_pc = mysql_clean(str_replace("$", "", $_GET['fs_pc']));
//$eb_pc = mysql_clean(str_replace("$", "", $_GET['eb_pc']));
//$bb_pc = mysql_clean(str_replace("$", "", $_GET['bb_pc']));
//
//$fs_xbox360 = mysql_clean(str_replace("$", "", $_GET['fs_xbox360']));
//$eb_xbox360 = mysql_clean(str_replace("$", "", $_GET['eb_xbox360']));
//$bb_xbox360 = mysql_clean(str_replace("$", "", $_GET['bb_xbox360']));
//
//$fs_xbox = mysql_clean(str_replace("$", "", $_GET['fs_xbox']));
//$eb_xbox = mysql_clean(str_replace("$", "", $_GET['eb_xbox']));
//$bb_xbox = mysql_clean(str_replace("$", "", $_GET['bb_xbox']));
//
//
//if (isset($_GET['fs_pc']) || isset($_GET['eb_pc']) || isset($_GET['eb_pc'])){
//	$tiv["PC"] = array ("fs" => $fs_pc, "eb" => $eb_pc, "bb" => $bb_pc);
//}
//
//if (isset($_GET['fs_xbox360']) || isset($_GET['eb_xbox360']) || isset($_GET['eb_xbox360'])){
//	$tiv["XBOX 360"] = array ("fs" => $fs_xbox360, "eb" => $eb_xbox360, "bb" => $bb_xbox360);
//}
//
////$tiv["Playstation 3"] = array ("fs" => 15.23, "eb" => 54.68, "bb" => 23.56);
////$tiv["Nintendo Wii"] = array ("fs" => 54.68, "eb" => 98.54, "bb" => 15.23);
//
//$sql = "INSERT INTO tivs (gameID, console, fs, eb, bb, time) VALUES ( ";
//
//foreach ($tiv as $row => $value) {
//
//	$sql .= "'11',  '".$row."', ";
//	
//	foreach ($value as $cost => $price) {		
//		
//		if ($tivcount < count($value)-1) {
//			$sql .= "'".$tiv[$row][$cost]."', ";
//		} else {
//			$sql .= "'".$tiv[$row][$cost]."', '".time()."' ";
//		}
//		
//		$tivcount++;
//		
//	}
//	if ($count < count($tiv)-1) {
//		$sql .= "), (";
//	} else {
//		$sql .= ");";
//	}
//	
//	$count++;
//	$tivcount = 0;
//}
//
//$tiv = array();
//
//echo $sql;

//mysql_query($sql);

//$sql = "SELECT *
//        FROM games
//        WHERE id = 4 OR id = 6 OR id = 11";
//$query = mysql_query($sql);
//$combinedResults = array();
//
//while($result = mysql_fetch_array($query)) {
//    $combinedResults[$result['game_name']][] = $result['esrb'];
//}
//
//echo '<ul>';
//
//// now loop through the combined results
//foreach(array_keys($combinedResults) as $groupKey) {
//    echo '<li>'.$groupKey;
//    echo '<ul>';
//    foreach($combinedResults[$groupKey] as $item) {
//        echo '<li>'.$item.'</li>';
//    }
//    echo '</ul></li>';
//}
//
//echo '</ul>';  
?>

<form action="sandbox2.php" method="post">

        <?php 
		
		$sql = "SELECT consoleID,console_name,name FROM consoles LIMIT 0,9 ;";
		$result = mysql_query($sql);
		 
		$flds = array("fs","eb","bb");
		$stors = array("Futureshop","EB Games","Blockbuster");
         
		while ($console = mysql_fetch_array($result)){	
		   echo "<div id=\"".$console['console_name']."tiv\">
					  <table cellpadding=\"4\" cellspacing=\"0\" border=\"0\">
					  <tr>
							  <td colspan=\"6\"><b>".$console['name']." Trade in values:</b></td>
					  </tr>";
					  
					  echo "<tr>";
				  
					  for ($g=0; $g<=2; $g++){
						  
						  echo "<td>$stors[$g]:</td>
								<td>$ <input name=\"tiv[".$console['consoleID']."][".$flds[$g]."]\" type=\"text\" size=\"3\" maxlength=\"5\" /></td>";
								
					  }
					  
					  echo "</tr><tr><td colspan=\"6\"><hr noshade=\"noshade\" color=\"#e2eaf9\" /></td></tr>";
					  
					  echo "</table></div>";
		}
		
		?>
		
		<br />
		<input type="submit" value="Submit Game" name="submit" class="bodybutn" /><br /><br /> 


</form>


<?php

if (isset($_POST['submit'])) {
	
	foreach($_POST['tiv'] as $console => $store){
			
			foreach($store as $tivs){
				
				if (isset($tivs) && $tivs != "" && is_numeric($tivs) ) {
					$goforit = 1;
				}
				
			}				

	}
	
	/////////////////////////////////	


	if ($goforit == 1){
	$temp = array();
									$temp2 = array();
									
										foreach($_POST['tiv'] as $console_type => $store){
											
											if ( isset($_POST['tiv'][$console_type]['fs']) && $_POST['tiv'][$console_type]['fs'] != "" && is_numeric($_POST['tiv'][$console_type]['fs']) ||
												 isset($_POST['tiv'][$console_type]['eb']) && $_POST['tiv'][$console_type]['eb'] != "" && is_numeric($_POST['tiv'][$console_type]['eb']) ||
												 isset($_POST['tiv'][$console_type]['bb']) && $_POST['tiv'][$console_type]['bb'] != "" && is_numeric($_POST['tiv'][$console_type]['bb']) ) {
																
												$temp2[] = "('2','".mysql_clean($console_type)."'";
															 
												foreach($store as $tivs){
													
													$temp2[] = "'".mysql_clean($tivs)."'";
													
												}
												
												$temp[] = join(',',$temp2).',\''.time().'\')';
												
												$temp2 = array();
									
											}
										}
									
									$sql = join(',',$temp);
									
									
										$sql = "INSERT INTO tivs (gameID,consoleID,fs,eb,bb,time) VALUES $sql;";
										echo $sql."<br>";
										mysql_query($sql) or die ("Error establishing your face!");
										
										unset($goforit);
									} else {
										echo "no query";
									}
	
	
}




?>
				
				