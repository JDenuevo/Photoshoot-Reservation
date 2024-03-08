<?php
$server="localhost";
$user="root";
$pass="";
$dbname="dbbsit3b";
//connection process
$conn= new mysqli($server,$user,$pass,$dbname);
if($conn->connect_error){
	die('connect_error');
}
?>