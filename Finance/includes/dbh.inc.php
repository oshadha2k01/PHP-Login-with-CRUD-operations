<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "Oshadha22700@";
$dbName ="practice";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
if(!$conn) {
    die("Connection failed:".mysqli_connect_error());
}
else {
}