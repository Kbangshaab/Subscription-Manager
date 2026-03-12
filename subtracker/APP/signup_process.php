<?php
require_once __DIR__ . '/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        // Now $pdo will be recognized because it's defined in db_config.php
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$user, $pass]);
        
        header("Location: ../index.php?registered=1");
        exit();
    } catch (PDOException $e) {
        header("Location: ../signup.php?error=taken");
        exit();
    }
}
?>