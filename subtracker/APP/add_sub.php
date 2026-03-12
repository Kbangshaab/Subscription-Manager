<?php
session_start();
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $name = $_POST['name'];
    $renew = $_POST['renew'];
    $price = $_POST['price'];

    try {
        $stmt = $pdo->prepare("INSERT INTO subscriptions (user_id, name, renew, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $name, $renew, $price]);
        echo "Success";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>