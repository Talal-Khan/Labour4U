<?php 
$host="projectdb.cxsld4crrrcy.us-east-1.rds.amazonaws.com";
$user="admin";
$password="abeer???";

// Database Name
$db="projectdb";

// Command to create connection
//$mysql=mysqli_connect($host,$user,$password,$db);
$conn = new PDO($host, $user, $password, $db);

// if connection not created
if(!$mysql)
{
    // die and dump this connection
    die("Connection Unsuccessful".mysqli_error());
}


?>
