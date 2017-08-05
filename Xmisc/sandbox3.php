<?php 

include("../includes/connection.php");
include("../includes/functions.php");

//$key = time()."craeyon"."1".rand(1,10000000);
//
////echo $key."<br>".md5($key);
//
//
//
//$akey = randomKey(16).base64_encode("spitfire").randomKey(16);
//
//echo base64_encode("spitfire");
//
//echo "<br>";
//
//$split = str_split($akey);
//$storeme = array();
//
//for ($i=0; $i < strlen($akey); $i++) {
//	
//	if ($i > 15 && $i < strlen($akey)-16) {
//		$storeme[] = $split[$i];
//	}
//}
//
//$final = join("", $storeme);
//
//echo base64_decode($final);

//$tivalue = mysql_query("SELECT * FROM tivs WHERE gameID = '3' AND consoleID = '3';") or die ("Error connecting to database");
//
//for ( $row = 0; $row < mysql_num_rows($tivalue); $row++ ) {   
//   
//   $col = $row;
//   
//   echo $col."&nbsp;".$row."&nbsp; = ";
//   
//   $chart [ 'chart_data' ][ 0 ][ $col ] = unix_todate(mysql_result( $tivalue, $row, "time"), $format = 'd M Y');
//   
//   
//   $chart [ 'chart_data' ][ $row ][ $col ] = mysql_result( $tivalue, $row, "bb");
//		
//
// 	echo $chart [ 'chart_data' ][ $row ][ $col ]."<br>";
////   
////   $chart [ 'chart_data' ][ $row ][ $col ] = mysql_result( $tivalue, $row, "fs");
////  
//	//echo $chart [ 'chart_data' ][ 0 ][ $col ]."&nbsp;";
//	
//}


//$lolarray = array("fs","eb","bb");
//
//$tivalue = mysql_query("SELECT * FROM tivs WHERE gameID = '5' AND consoleID = '3' LIMIT 0,30;") or die ("Error connecting to database");
//
//for ( $row = 0; $row < mysql_num_rows($tivalue); $row++ ) {   
//   $col = $row+1;   
//   $chart [ 'chart_data' ][ 0 ][ $col ] = unix_todate(mysql_result( $tivalue, $row, "time"), $format = 'd M y');
//   
//   
//   for ( $k=1; $k <= 3; $k++ ) {
//	   
//	   echo $k."&nbsp;".$col." = ";
//	   $chart [ 'chart_data' ][ $k ][ $col ] = mysql_result( $tivalue, $row, $lolarray[$k-1] );
//	   echo $chart [ 'chart_data' ][ $k ][ $col ]."<br>";
//	   
//   }
//	   
//   //$chart [ 'chart_data' ][ $row ][ $col ] = mysql_result( $tivalue, $row, "bb");
//}

echo displayconsoles_chart();




?>


				
				