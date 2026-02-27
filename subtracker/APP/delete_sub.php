<?php
include 'config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete the row where the ID matches
    $sql = "DELETE FROM subscriptions WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}

$conn->close();
?>