<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "hms";

$conn = new mysqli($host, $username, $password, $database);
if(!$conn){
    echo "Database connection failed. Error:".$conn->error;
    exit;
}
?>