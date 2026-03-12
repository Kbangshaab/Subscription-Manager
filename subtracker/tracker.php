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
    <title>Subscription Manager</title>
    <link rel="stylesheet" href="CSS/Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<h1>Subscription Manager</h1>
<p>Visual look at your subscriptions. It is not made in any currency, so the price you choose are in what currency you want.</p>

<div class="form-container">
    <label for="currency-selector">Choose Currency:</label>
    <select id="currency-selector">
        <option value="1">DKK (kr)</option>
        <option value="0.13">EUR (€)</option>
        <option value="0.14">USD ($)</option>
        <option value="0.11">GBP (£)</option>
    </select>
<div class="navigation-header">
    <a href="menu.php" class="back-btn">
        <span class="arrow">←</span> Back to Menu
    </a>
</div>
    <h3>Add New Subscription</h3>
    <input type="text" id="sub-name" placeholder="Subscription Name (e.g. Spotify)">
    <input type="text" id="sub-renew" placeholder="Renewal (e.g. Monthly)">
    <input type="number" id="sub-price" placeholder="Price (e.g. 12.99)" step="0.01">
    <button id="add-sub-btn">Add Subscription</button>
</div>


<table>
    <thead>
    <tr>
        <th>Subscription</th>
        <th>Renew Date</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody id="subscription-list">
    </tbody>
</table>
<h2 style="text-align: left; margin-top: 20px;">
    Total Monthly Cost: <span id="total-display">0.00</span>
</h2>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="JS/app.js"></script>

</body>
</html>