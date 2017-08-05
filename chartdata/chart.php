<?php   
/*
 Example1 : A simple line chart
*/

// Standard inclusions      
include("pChart/pData.class");   
include("pChart/pChart.class");
include("pChart/pCache.class");
require_once("../includes/connection.php");
require_once("../includes/functions.php");

///////////////////////////////////////////////

$gameID = $_GET['gameID'];
$gameID = mysql_clean($gameID);

$consoleID = $_GET['consoleID'];  // set defualts for consoleID
if (isset($consoleID) && is_numeric($consoleID) && strlen($consoleID) == 1 ) {
	$consoleID = mysql_clean($consoleID);
} else {
	$consoleID = 2;
}

$storeID = $_GET['storeID'];  // set defaults for storeID
if (isset($storeID) && is_numeric($storeID) && strlen($storeID) == 1) {
	$storeID = mysql_clean($storeID);
} else {
	$storeID = 0;
}

$tivalue = mysql_query("SELECT * FROM tivs WHERE gameID = '".$gameID."' AND consoleID = '".$consoleID."' ORDER BY id ASC LIMIT 0,30;") or die ("Error connecting to database");
//$tivtime = mysql_fetch_array($tivalue);
//////////////////////////////////////////////

// Dataset definition 
$DataSet = new pData;

if (mysql_num_rows($tivalue) == 0) {
	
   $DataSet->AddPoint("", "Serie1" );
   $DataSet->AddPoint("", "Serie2" );
   $DataSet->AddPoint("", "Serie3" );
   $DataSet->AddPoint("", "Label" );
   $nodata = 1;
	
} else {
	
	
	if (isset($_GET['storeID']) && $_GET['storeID'] == 0) {
		
		while ($tivdata = mysql_fetch_array($tivalue)) {
		   $DataSet->AddPoint( $tivdata['fs'], "Serie1" );
		   $DataSet->AddPoint( $tivdata['eb'], "Serie2" );
		   $DataSet->AddPoint( $tivdata['bb'], "Serie3" );
		   $DataSet->AddPoint( unix_todate(($tivdata['time']), $format = 'd M y'), "Label" );
		}
		
	}
	
	if (isset($_GET['storeID']) && $_GET['storeID'] == 1) {
		
		while ($tivdata = mysql_fetch_array($tivalue)) {
		   $DataSet->AddPoint( $tivdata['fs'], "Serie1" );
		   $DataSet->AddPoint( unix_todate(($tivdata['time']), $format = 'd M y'), "Label" );
		}
		
	}
	
	if (isset($_GET['storeID']) && $_GET['storeID'] == 2) {
		
		while ($tivdata = mysql_fetch_array($tivalue)) {
		   $DataSet->AddPoint( $tivdata['eb'], "Serie1" );
		   $DataSet->AddPoint( unix_todate(($tivdata['time']), $format = 'd M y'), "Label" );
		}
		
	}
	
	if (isset($_GET['storeID']) && $_GET['storeID'] == 3) {
		
		while ($tivdata = mysql_fetch_array($tivalue)) {
		   $DataSet->AddPoint( $tivdata['bb'], "Serie1" );
		   $DataSet->AddPoint( unix_todate(($tivdata['time']), $format = 'd M y'), "Label" );
		}
		
	}
	
	if (!isset($_GET['storeID']) || $_GET['storeID'] != 0 || $_GET['storeID'] != 1 || $_GET['storeID'] != 2 || $_GET['storeID'] != 3 || !is_numeric($_GET['storeID']) ) {
		
		while ($tivdata = mysql_fetch_array($tivalue)) {
		   $DataSet->AddPoint( $tivdata['fs'], "Serie1" );
		   $DataSet->AddPoint( $tivdata['eb'], "Serie2" );
		   $DataSet->AddPoint( $tivdata['bb'], "Serie3" );
		   $DataSet->AddPoint( unix_todate(($tivdata['time']), $format = 'd M y'), "Label" );
		}
		
	}		
	
}

$DataSet->AddSerie("Serie1");
$DataSet->AddSerie("Serie2");
$DataSet->AddSerie("Serie3");

$DataSet->SetAbsciseLabelSerie("Label");
$DataSet->SetYAxisUnit("$");

$DataSet->SetSerieName("Futureshop","Serie1");
$DataSet->SetSerieName("EB Games","Serie2");
$DataSet->SetSerieName("BlockBuster","Serie3");

$DataSet->SetYAxisName("Trade in Value"); 

// Cache definition   
$Cache = new pCache($CacheFolder="Cache/");  
$Cache->GetFromCache("Graph",$DataSet->GetData()); 

// Initialise the graph   
$Test = new pChart(845,320);
$Test->setFontProperties("Fonts/pf_arma_five.ttf",6);   
$Test->setGraphArea(60,25,815,250);   
$Test->drawFilledRoundedRectangle(7,7,835,310,5,230,230,230);   
$Test->drawRoundedRectangle(5,5,837,312,5,230,230,230);   
$Test->setFixedScale(0,100,5); 
$Test->drawGraphArea(255,255,255,TRUE);
$Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,50,50,50,TRUE,90,2);   
$Test->drawGrid(4,TRUE,230,230,230,50);

$Test->setColorPalette(0,190,0,39); 
$Test->setColorPalette(1,0,0,0); 
$Test->setColorPalette(2,33,43,121); 

// Draw the 0 line   
$Test->setFontProperties("Fonts/pf_arma_five.ttf",6);   
$Test->drawTreshold(0,143,55,72,TRUE,TRUE);   

// Draw the line graph
$Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());   
$Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);   

// Finish the graph   
$Test->setFontProperties("Fonts/pf_arma_five.ttf",6);   
$Test->drawLegend(725,32,$DataSet->GetDataDescription(),240,240,240);   
$Test->setFontProperties("Fonts/pf_arma_five.ttf",6);   

if ($nodata ==1) {
	$Test->drawTitle(290,140,"No data Available",50,50,50,585);
	unset($nodata);
}

$Cache->WriteToCache("Graph",$DataSet->GetData(),$Test);
$Test->Stroke();
?>