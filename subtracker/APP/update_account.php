<?php
session_start();
require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $newUsername = $_POST['username'];
    $userId = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("UPDATE users SET username = ? WHERE id = ?");
        $stmt->execute([$newUsername, $userId]);
        
        // Update the session so the menu shows the new name
        $_SESSION['username'] = $newUsername;

        header("Location: ../account_settings.php?success=1");
    } catch (PDOException $e) {
        header("Location: ../account_settings.php?error=name_taken");
    }
}