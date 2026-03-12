<?php
$host = "localhost";
$user = "root";
$pass = "root"; 
$dbname = "subtracker_db"; // Ensure this matches your DB name in Rider
$port = 8889; 

try {
    // This creates the $pdo variable using the PDO library
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    
    // Set error mode so we can see if something goes wrong
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>