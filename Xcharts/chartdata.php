<?php

//include charts.php to access the SendChartData function
require_once("charts.php");
require_once("../includes/connection.php");
require_once("../includes/functions.php");

$gameID = $_GET['gameID'];
$gameID = mysql_clean($gameID);

$consoleID = $_GET['consoleID'];
if (isset($consoleID) && is_numeric($consoleID) && strlen($consoleID) == 1) {
	$consoleID = mysql_clean($consoleID);
} else {
	$consoleID = 2;
}


$chart[ 'axis_category' ] = array ( 'size'=>10, 'color'=>"000000", 'alpha'=>85, 'font'=>"arial", 'bold'=>true, 'skip'=>0 ,'orientation'=>"vertical_up" ); 
$chart[ 'axis_ticks' ] = array ( 'value_ticks'=>true, 'category_ticks'=>true, 'major_thickness'=>2, 'minor_thickness'=>1, 'minor_count'=>1, 'major_color'=>"000000", 'minor_color'=>"222222" ,'position'=>"outside" );
$chart[ 'axis_value' ] = array (  'min'=>0, 'max'=>100, 'font'=>"arial", 'bold'=>true, 'size'=>10, 'color'=>"000000", 'alpha'=>85, 'steps'=>5, 'prefix'=>"$", 'suffix'=>"", 'decimals'=>0, 'separator'=>"", 'show_min'=>true );

$chart[ 'chart_border' ] = array ( 'color'=>"000000", 'top_thickness'=>1, 'bottom_thickness'=>1, 'left_thickness'=>1, 'right_thickness'=>1);


$chart [ 'chart_data' ][ 0 ][ 0 ] = "";
$chart [ 'chart_data' ][ 1 ][ 0 ] = "Futureshop";
$chart [ 'chart_data' ][ 2 ][ 0 ] = "EB Games";
$chart [ 'chart_data' ][ 3 ][ 0 ] = "Blockbuster";

$chart[ 'draw' ] = array();

$store_array = array("fs","eb","bb");

$tivalue = mysql_query("SELECT * FROM tivs WHERE gameID = '".$gameID."' AND consoleID = '".$consoleID."' ORDER BY id ASC LIMIT 0,30;") or die ("Error connecting to database");

if (mysql_num_rows($tivalue) == 0) {
	
	$chart[ 'draw' ][] = array ( 'type'=>"text", 'color'=>"000000", 'alpha'=>35, 'font'=>"arial", 'rotation'=>0, 'bold'=>true, 'size'=>30, 'x'=>375, 'y'=>-25, 'width'=>320, 'height'=>300, 'text'=>"No Data", 'h_align'=>	"left", 'v_align'=>"middle" );
	
	$chart [ 'legend_label' ] = array ( 'layout' => "horizontal", 'bullet' => 'line', 'font' => "Arial", 'bold' =>  true, 'size' =>  12, 'color' => "000000", 'alpha' => 100 );
	$chart[ 'legend_rect' ] = array ( 'x'=>-100, 'y'=>-100, 'width'=>350, 'height'=>10, 'margin'=> 0 ); 
	
} else {

	for ( $row = 0; $row < mysql_num_rows($tivalue); $row++ ) {   
	   $col = $row+1;   
	   $chart [ 'chart_data' ][ 0 ][ $col ] = unix_todate(mysql_result( $tivalue, $row, "time"), $format = 'd M y');
	   
	   for ( $k=1; $k <= 3; $k++ ) {	   
		   $chart [ 'chart_data' ][ $k ][ $col ] = mysql_result( $tivalue, $row, $store_array[$k-1] );	   
	   }	   
	}
	
	$chart [ 'legend_label' ] = array ( 'layout' => "horizontal", 'bullet' => 'line', 'font' => "Arial", 'bold' =>  true, 'size' =>  12, 'color' => "000000", 'alpha' => 100 );
	$chart[ 'legend_rect' ] = array ( 'x'=>450, 'y'=>40, 'width'=>350, 'height'=>10, 'margin'=> 0 ); 
	
}

$chart[ 'draw' ][] = array ( 'type'=>"text", 'color'=>"999999", 'alpha'=>35, 'font'=>"arial", 'rotation'=>-90, 'bold'=>true, 'size'=>30, 'x'=>0, 'y'=>275, 'width'=>300, 'height'=>150, 'text'=>"Trade in value", 'h_align'=>"center", 'v_align'=>"top" );
$chart[ 'draw' ][] = array ( 'type'=>"text", 'color'=>"000000", 'alpha'=>15, 'font'=>"arial", 'rotation'=>0, 'bold'=>true, 'size'=>30, 'x'=>40, 'y'=>-40, 'width'=>320, 'height'=>300, 'text'=>"Date", 'h_align'=>"left", 'v_align'=>"bottom" );

$chart[ 'chart_grid_h' ] = array ( 'alpha'=>10, 'color'=>"000000", 'thickness'=>1, 'type'=>"solid" );
$chart[ 'chart_grid_v' ] = array ( 'alpha'=>10, 'color'=>"000000", 'thickness'=>1, 'type'=>"solid" );
$chart[ 'chart_pref' ] = array ( 'line_thickness'=>2, 'point_shape'=>"none", 'fill_shape'=>false );
$chart[ 'chart_rect' ] = array ( 'x'=>40, 'y'=>25, 'width'=>775, 'height'=>200, 'positive_color'=>"ffffff", 'positive_alpha'=>80, 'negative_color'=>"ff0000",  'negative_alpha'=>10 );
$chart[ 'chart_type' ] = "Line";
$chart[ 'chart_value' ] = array ( 'prefix'=>"$", 'suffix'=>"", 'decimals'=>2, 'separator'=>"", 'position'=>"cursor", 'hide_zero'=>true, 'as_percentage'=>false, 'font'=>"arial", 'bold'=>true, 'size'=>12, 'color'=>"000000", 'alpha'=>75 );

$chart[ 'series_color' ] = array ( "BE0027", "000000", "22367D" );

SendChartData ($chart);


?>
