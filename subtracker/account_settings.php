<?php
session_start();
require_once 'APP/db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch current user data to pre-fill the form
$stmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Settings - SubTracker</title>
    <link rel="stylesheet" href="CSS/Style.css?v=1.3">
</head>
<body class="dashboard-bg">
    <div class="menu-container">
        <header class="menu-header">
            <div class="navigation-header">
                <a href="menu.php" class="back-btn">← Back to Dashboard</a>
            </div>
            <h1>Account <span>Settings</span></h1>
        </header>
    <?php if (isset($_GET['success'])): ?>
        <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            ✅ Settings updated successfully!
        </div>
    <?php endif; ?>

        <div class="form-container">
            <form action="APP/update_account.php" method="POST">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

                <label>Default Currency</label>
                <select name="default_currency">
                    <option value="1">DKK (kr)</option>
                    <option value="0.14">USD ($)</option>
                    <option value="0.13">EUR (€)</option>
                </select>

                <button type="submit" id="add-sub-btn" style="background-color: #2563eb;">Save Changes</button>
            </form>
            
            <hr style="margin: 30px 0; border: 0; border-top: 1px solid #e2e8f0;">
            
            <div style="text-align: center;">
                <p style="color: #64748b; font-size: 0.9rem;">Danger Zone</p>
                <button onclick="deleteAccount()" style="background-color: #ef4444; margin-top: 10px;">Delete Account Forever</button>
            </div>
        </div>
    </div>

    <script>
        function deleteAccount() {
            if(confirm("Are you absolutely sure? This will delete all your subscriptions and cannot be undone.")) {
                window.location.href = "APP/delete_account.php";
            }
        }
    </script>
</body>
</html>