<?php
session_start();
// If user is already logged in, send them straight to the menu
if(isset($_SESSION['user_id'])) {
    header("Location: menu.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - SubTracker</title>
    <link rel="stylesheet" href="./CSS/Style.css?v=21">
</head>
<body>
    <div class="form-container" style="margin-top: 100px; max-width: 400px;">
        <h2 style="text-align: center;">Login</h2>
        <form action="APP/login_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required style="width:100%; margin-bottom:10px; padding:10px;">
            <input type="password" name="password" placeholder="Password" required style="width:100%; margin-bottom:20px; padding:10px;">
            <button type="submit" id="add-sub-btn">Sign In</button>
        </form>
    <div style="text-align: center; margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px;">
        <p style="font-size: 0.9rem; color: #64748b;">
            New here? <a href="signup.php" style="color: #2563eb; text-decoration: none; font-weight: 600;">Create an account</a>
        </p>
    </div>
        <?php 
        if(isset($_GET['error'])) { 
            echo '<p style="color:red; text-align:center;">Invalid Login!</p>'; 
        } 
        ?>
    </div>
</body>
</html>