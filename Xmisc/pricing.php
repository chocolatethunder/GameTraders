<?php

$game_id = 1;

require_once("includes/connection.php");

$eb = mysql_fetch_array(mysql_query("SELECT ps3 FROM tiv_eb_games WHERE gameID = ".$game_id.";"));


			foreach ($eb as $price){
				echo "\t\t<number>".$eb['ps3']."</number>\n";
			}




?>