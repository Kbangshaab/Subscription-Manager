<?php
session_start();
require_once 'db_config.php'; 

header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit();
}

try {
    $userId = $_SESSION['user_id'];
    
    // Prepare the SQL to fetch only THIS user's subscriptions
    $stmt = $pdo->prepare("SELECT id, name, renew, price FROM subscriptions WHERE user_id = ?");
    $stmt->execute([$userId]);
    
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($data);

} catch (PDOException $e) {
    // If there is a database error, send it back so we can see it in the console
    echo json_encode(["error" => $e->getMessage()]);
}
?>