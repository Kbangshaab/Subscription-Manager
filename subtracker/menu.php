<?php
session_start();
// Security: Redirect to login if they aren't logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu - SubTracker</title>
    <link rel="stylesheet" href="CSS/Style.css?v=1.3">
</head>
<body class="dashboard-bg">
    <div class="menu-container">
        <header class="menu-header">
            <h1>Welcome back, <span><?php echo htmlspecialchars($_SESSION['username']); ?></span></h1>
            <p>What would you like to manage today?</p>
        </header>

        <div class="menu-grid">
            <a href="tracker.php" class="glass-card">
                <div class="card-icon">📊</div>
                <div class="card-content">
                    <h3>Subscription Tracker</h3>
                    <p>View, add, and analyze your monthly spending.</p>
                </div>
                <div class="card-arrow">→</div>
            </a>

            <a href="account_settings.php" class="glass-card">
                <div class="card-icon">⚙️</div>
                <div class="card-content">
                    <h3>Account Settings</h3>
                    <p>Manage your profile, username, and security.</p>
                </div>
                <div class="card-arrow">→</div>
            </a>

            <a href="about.php" class="glass-card">
                <div class="card-icon">❓</div>
                <div class="card-content">
                    <h3>How it Works</h3>
                    <p>Learn how to get the most out of your tracker.</p>
                </div>
                <div class="card-arrow">→</div>
            </a>

            <a href="APP/logout.php" class="glass-card logout-card">
                <div class="card-icon">🚪</div>
                <div class="card-content">
                    <h3>Logout</h3>
                    <p>Safely sign out of your account.</p>
                </div>
                <div class="card-arrow">→</div>
            </a>
        </div>
    </div>
</body>
</html>