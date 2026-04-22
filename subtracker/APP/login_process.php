<?php
session_start();
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];

    // 1. Find the user in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $user]);
    $db_user = $stmt->fetch();

    // 2. Check if user exists and password is correct
    if ($db_user && password_verify($pass, $db_user['password'])) {
        $_SESSION['user_id'] = $db_user['id'];
        $_SESSION['username'] = $db_user['username'];
        
        header("Location: ../menu.php");
        exit();
    } else {
        // FAIL: Send back to login with error
        header("Location: ../index.php?error=invalid_login");
        exit();
    }
}