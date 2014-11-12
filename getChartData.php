<?php
include("DatabaseConnection.php");

if(!empty($_GET['modeID'])){
   $modeID = $_GET['modeID']; 
}

$company_name = $_GET['company'];
$chart = $_GET['chart'];

$data = array();
$result_data = array();

if(!empty($_GET['setID']))
{
$setID = $_GET['setID'];

$result = mysql_query("SELECT $setID FROM $company_name WHERE chart_type='$chart' LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][][] = $row[$setID];
}

} // quarter

else if($modeID=='quarter')
{

$result = mysql_query("SELECT `quarter` FROM $company_name WHERE chart_type='$chart' LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][][] = $row['quarter'];
}

}

else if($chart=='pie')
{

$result = mysql_query("SELECT `company` , $modeID   FROM $company_name WHERE chart_type='$chart' LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][0] = $company_name;
$data['data'][1] = (float) $row[$modeID];

}

} // pie chart


else if($chart=='candlestick' && $modeID !='quarter')
{

$result = mysql_query("SELECT $modeID FROM $company_name WHERE chart_type='$chart' LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data[][]= $row[$modeID];
}  
	
}

else
{

$result = mysql_query("SELECT $modeID FROM $company_name WHERE chart_type='$chart' LIMIT 0, 30");

while($row = mysql_fetch_assoc($result)) {

$data['data'][]= (float)$row[$modeID];
}  
	
} // others

if (!$result) {
    die("Query to show fields from table failed");
}

if($chart=='candlestick' && $modeID !='quarter'){
array_push($result_data,$data); 

$val_data1 =  json_encode($data);

$val_data2 = str_replace('"', '', $val_data1);

$get_data = '[{"data":'.$val_data2.'}]';

echo $get_data;
}

else {

array_push($result_data,$data); 

echo json_encode($result_data);
    
}

?>