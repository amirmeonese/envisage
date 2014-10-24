<?php

$conn = mysql_connect("localhost","root","");
 if( ! $conn )
 {
 	echo " database not connected";
 }
 else
 {
 	//echo " database connected";
 }
 
$dbname = 'import';
 
 if( ! mysql_select_db("import",$conn) )
{
 	echo " database not connected";
}
else
{ 
	//echo " database connected";
}


?>