<?php

$conn = mysql_connect("localhost","azieruzai_apurba","Apurba2014!");
 if( ! $conn )
 {
 	echo " database not connected";
 }
 else
 {
 	//echo " database connected";
 }
 
 if( ! mysql_select_db("azieruzai_envisage",$conn) )
{
 	echo " database not connected";
}
else
{ 
	//echo " database connected";
}


?>