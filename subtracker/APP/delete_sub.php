<?php
session_start();
require_once __DIR__ . '/db_config.php';

// 1. Check if user is logged in
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    
    $subId = $_POST['id'];
    $userId = $_SESSION['user_id'];

    try {
        // 2. Security: Only delete if the ID matches AND it belongs to this User
        $stmt = $pdo->prepare("DELETE FROM subscriptions WHERE id = ? AND user_id = ?");
        $stmt->execute([$subId, $userId]);

        if ($stmt->rowCount() > 0) {
            echo "Deleted";
        } else {
            echo "Not found or unauthorized";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Unauthorized";
}
?>