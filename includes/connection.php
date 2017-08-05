<?php

if ($_SERVER['REQUEST_URI'] == "/Gametraders/includes/functions.php") {
	header ("Location: ../404.php");
}

define('dbhost', 'localhost');
define('dbuser', '');
define('dbpass', '');


//connect to the database
$connect = mysql_connect(dbhost, dbuser, dbpass);
if(!$connect){
	die("Looks like the database failed to connect");
	}

// select the database
$db = mysql_select_db('gametraders',$connect);
if (!$db){
	die("The database failed to initiate");
}

?>