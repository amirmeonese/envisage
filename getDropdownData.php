<?php
include("DatabaseConnection.php");

if(!empty($_GET['table'])){
   $tableID = $_GET['table']; 
}

$data = array();
$result_data = array();

$sql = "SELECT column_name
FROM   information_schema.columns
WHERE  table_name = '$tableID'";

$result = mysql_query($sql);

while($row = mysql_fetch_assoc($result)) {

$data['data'][]= $row['column_name'];

}

if (!$result) {
    die("Query to show fields from table failed");
}

array_push($result_data,$data); 

echo json_encode($result_data);
    


?>