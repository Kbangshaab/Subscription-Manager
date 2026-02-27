<?php
// MAMP default settings
$host = "localhost";
$user = "root";
$pass = "root"; // MAMP default password is root
$dbname = "Subscription"; // This must match your CREATE DATABASE name exactly
$port = 8889; // MAMP default MySQL port

// Establish the connection
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Check if it worked
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// If we reach here, the connection is successful!
?>