<?php
include 'config.php';
header('Content-Type: application/json');

// Using lowercase 'subscriptions' to match your CREATE TABLE
$sql = "SELECT id, name, renew, price FROM subscriptions";
$result = $conn->query($sql);

$data = array();
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>