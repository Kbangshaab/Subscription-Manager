<?php
include 'config.php';

// Get data from the JavaScript request
$name = $_POST['name'];
$renew = $_POST['renew'];
$price = $_POST['price'];

// Insert into your 'subscriptions' table
$sql = "INSERT INTO subscriptions (name, renew, price) VALUES ('$name', '$renew', '$price')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>