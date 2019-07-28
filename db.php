<?php 
$host = "localhost";
$mysql_username = "root";
$mysql_password = "";
$db_name = "library";

$con = mysqli_connect($host,
					 $mysql_username,
					 $mysql_password, 
					 $db_name);

if(mysqli_connect_errno()){
	echo "Failed in connection to 
	mysql db";
	echo (mysqli_connect_error());
	exit();
} 
?>