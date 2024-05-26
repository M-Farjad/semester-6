<?php
session_start();

// Simulated database connection
$transactions = [
    ['date' => '2024-04-23', 'amount' => 100, 'description' => 'Grocery shopping'],
    ['date' => '2024-04-22', 'amount' => 50, 'description' => 'Dinner with friends'],
    ['date' => '2024-04-21', 'amount' => 200, 'description' => 'Utility bill payment']
];

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Transaction Details</h2>
        <?php if (!empty($transactions)): ?>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?php echo $transaction['date']; ?></td>
                        <td>$<?php echo $transaction['amount']; ?></td>
                        <td><?php echo $transaction['description']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No transactions found.</p>
        <?php endif; ?>
        <a href="profile.php">Back to Profile</a>
    </div>
</body>
</html>
