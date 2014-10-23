<?php
include("DatabaseConnection.php");

$modeID = $_GET['modeID'];
$company_name = $_GET['company'];
$data = array();

if($modeID=='quarter')
{

$result = mysql_query("SELECT `quarter` FROM $company_name LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][][] = $row['quarter'];
}

}  

if($modeID=='net_income')
{

$result = mysql_query("SELECT `net_income` FROM $company_name LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][] = $row['net_income'];
}  
	
}
else if($modeID=='account_payable')
{

$result = mysql_query("SELECT `account_payable` FROM $company_name LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][] = $row['account_payable'];
}  

}
else if($modeID=='gross_margin')
{


$result = mysql_query("SELECT `gross_margin` FROM $company_name LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][] = $row['gross_margin'];
}  

}
else if($modeID=='net_sales')
{

$result = mysql_query("SELECT `net_sales` FROM $company_name LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][] = $row['net_sales'];
}  

}

if (!$result) {
    die("Query to show fields from table failed");
}

$result_data = array();
array_push($result_data,$data);  

echo json_encode($result_data, JSON_NUMERIC_CHECK);

?>