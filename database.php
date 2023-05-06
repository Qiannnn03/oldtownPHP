<?php

$servername = "php-database.cdnok204jmx0.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "admin123";
$dbname = "oldtown";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
