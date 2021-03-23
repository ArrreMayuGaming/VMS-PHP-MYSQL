<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "vms";

// Creating connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Databse connected successfully";
?>