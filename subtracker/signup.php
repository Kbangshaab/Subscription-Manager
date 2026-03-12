<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - SubTracker</title>
    <link rel="stylesheet" href="./CSS/Style.css?v=21">
</head>
<body>
    <div class="form-container" style="margin-top: 100px; max-width: 400px;">
        <h2 style="text-align: center;">Create Account</h2>
        <form action="APP/signup_process.php" method="POST">
            <input type="text" name="username" placeholder="Choose Username" required style="width:100%; margin-bottom:10px; padding:10px;">
            <input type="password" name="password" placeholder="Choose Password" required style="width:100%; margin-bottom:20px; padding:10px;">
            <button type="submit" id="add-sub-btn">Register</button>
        </form>
        <div style="text-align: center; margin-top: 15px;">
            <a href="index.php" style="color: #64748b; text-decoration: none; font-size: 0.9rem;">Back to Login</a>
        </div>
    </div>
</body>
</html>