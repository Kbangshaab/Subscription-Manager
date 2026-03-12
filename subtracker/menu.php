<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SubTracker</title>
    <link rel="stylesheet" href="CSS/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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

            <a href="#" class="glass-card">
                <div class="card-icon">⚙️</div>
                <div class="card-content">
                    <h3>Account Settings</h3>
                    <p>Manage your profile, currency, and security.</p>
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