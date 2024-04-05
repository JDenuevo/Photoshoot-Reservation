<?php
$server="localhost";
$user="root";
$pass="";
$dbname="photoshoot";
//connection process
$conn= new mysqli($server,$user,$pass,$dbname);
if($conn->connect_error){
	die('connect_error');
}

?>