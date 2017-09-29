<?php
session_start();
$name =$_POST["Name"];
$pass =$_POST["Password"];
require_once('mysqli_connect2.php');
$query = "SELECT * FROM users WHERE Name='".$name."' AND Password='".$pass."'";
$response = @mysqli_query($dbc, $query);

if(mysqli_num_rows($response))
{
	$_SESSION['ID']= $name; 
	mysqli_close($dbc);
	$url = 'home.php';
    header( "Location: $url" );
} 
else 
	echo 'No data Found. Could not login';

mysqli_close($dbc);
?>