<?php
session_start();

// Simulated database connection
$balances = [
    'user1' => 500,
    'user2' => 1000
];

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient = $_POST['recipient'] ?? '';
    $amount = $_POST['amount'] ?? '';

    // Validate recipient and amount
    if ($recipient && $amount && is_numeric($amount) && $amount > 0) {
        // Check if sender has sufficient balance
        if ($balances[$username] >= $amount) {
            // Process the transaction (you would implement this part)
            // Update sender's and recipient's balances in the database
            // Redirect to profile page after successful transaction
            header("Location: profile.php");
            exit();
        } else {
            $error_message = "Insufficient balance.";
        }
    } else {
        $error_message = "Invalid recipient or amount.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Transaction</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>New Transaction</h2>
        <?php if (isset($error_message)): ?>
            <p class="error-msg"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" name="recipient" placeholder="Recipient" required><br>
            <input type="number" name="amount" placeholder="Amount" required><br>
            <button type="submit">Send</button>
        </form>
        <a href="profile.php">Back to Profile</a>
    </div>
</body>
</html>
