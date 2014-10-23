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
 
 if( ! mysql_select_db("import",$conn) )
{
 	echo " database not connected";
}
else
{ 
	//echo " database connected";
}


?>