<?php 
$host="localhost";
$user="root";
$password="";

// Database Name
$db="projectdb";

// Command to create connection
$mysql=mysqli_connect($host,$user,$password,$db);

// if connection not created
if(!$mysql)
{
    // die and dump this connection
    die("Connection Unsuccessful".mysqli_error());
}


?>
