<?php
$server = "us-cdbr-iron-east-03.cleardb.net";
$username = "b385796ef05d80";
$password = "913a5be9";
$database = "heroku_477c0bdc9d7ca5a";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
$dbc = mysql_select_db($database, $con);
session_start();
$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT Id_usu FROM usuarios WHERE email ='$email' AND password= '$password'";
$exec = mysql_query($sql,$con);
if (!$exec) {
	die('Error: ' . mysql_error());
} else {
	$fila = mysql_fetch_assoc($exec);
   		if($fila)
   		{
   			$status = 200;  
    	}
    	else
    	{
   			$status = 500;   
    	}
    	echo json_encode($status);   		
}
?>