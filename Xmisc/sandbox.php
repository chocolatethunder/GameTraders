<?php

	mysql_connect("localhost", "root", "gametraders");
    mysql_select_db("gametraders");

    function sess_open($sess_path, $sess_name) {
        return true;
    }

    function sess_close() {
        return true;
    }

    function sess_read($sess_id) {
        $result = mysql_query("SELECT Data FROM sessions WHERE SessionID = '$sess_id';");
        if (!mysql_num_rows($result)) {
            $CurrentTime = time();
            mysql_query("INSERT INTO sessions (SessionID, DateTouched) VALUES ('$sess_id', $CurrentTime);");
            return '';
        } else {
            extract(mysql_fetch_array($result), EXTR_PREFIX_ALL, 'sess');
            mysql_query("UPDATE sessions SET DateTouched = $CurrentTime WHERE SessionID = '$sess_id';");
            return $sess_Data;
        }
    }

    function sess_write($sess_id, $data) {
        $CurrentTime = time();
        mysql_query("UPDATE sessions SET Data = '$data', DateTouched = $CurrentTime WHERE SessionID = '$sess_id';");
        return true;
    }

    function sess_destroy($sess_id) {
        mysql_query("DELETE FROM sessions WHERE SessionID = '$sess_id';");
        return true;
    }

    function sess_gc($sess_maxlifetime) {
        $CurrentTime = time();
        mysql_query("DELETE FROM sessions WHERE DateTouched + $sess_maxlifetime < $CurrentTime;");
        return true;
    }

    session_set_save_handler("sess_open", "sess_close", "sess_read", "sess_write", "sess_destroy", "sess_gc");
    
	session_start();

    $_SESSION['user'] = "saurabh";
    $_SESSION['id'] = "15";
	
	
	

function esrbvalue_list($esrbv){
	if ($esrbv == 1){
		echo "PC";
	} else if ($esrbv == 2) {
		echo "PS3";
	} else if ($esrbv == 3) {
		echo "XBOX 360";
	} else if ($esrbv == 4) {
		echo "Wii";
	} else if ($esrbv == 5) {
		echo "PS2";
	} else if ($esrbv == 6) {
		echo "XBOX";
	} else if ($esrbv == 7) {
		echo "Gamecube";
	}
}

$console[1] = $_GET['a'];
$console[2] = $_GET['b'];
$console[3] = $_GET['c'];
$console[4] = $_GET['d'];
$console[5] = $_GET['e'];
$console[6] = $_GET['f'];
$love = "";

for($i=1; $i<=6; $i++) {
	if ($console[$i] == 1){
		$love .= $i." ";
	}
}
// love gets saved into the database
$platforms = explode(" ", $love);

foreach ($platforms as $k => $value) {
	echo esrbvalue_list($value)."<br>";
}

?>