<?php
include("DatabaseConnection.php");

$modeID = $_GET['modeID'];
$company_name = $_GET['company'];
$chart = $_GET['chart'];

$data = array();
$result_data = array();

if($modeID=='quarter')
{

$result = mysql_query("SELECT `quarter` FROM $company_name WHERE chart_type='$chart' LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][][] = $row['quarter'];
}

} // quarter

else if($chart=='pie')
{

$result = mysql_query("SELECT `company` , $modeID   FROM $company_name WHERE chart_type='$chart' LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][0] = $row['company'];
$data['data'][1] = (float) $row[$modeID];

}

} // pie chart


else
{

$result = mysql_query("SELECT $modeID FROM $company_name WHERE chart_type='$chart' LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][] = (float) $row[$modeID];
}  
	
} // others

if (!$result) {
    die("Query to show fields from table failed");
}

array_push($result_data,$data);  

echo json_encode($result_data);

?>