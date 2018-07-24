<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "c300";


$link = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$link) {
	die(mysqli_error($link));
}

?>