<?php
ob_start();
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mwedms1";

// crearte connection
$connect = new Mysqli($servername, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
	die("Connection Failed : " . $connect->error);
} else {
	// echo "Successfully Connected";
}

?>
