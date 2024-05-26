<?php
include 'db.php'; // Include your DB config file

$username = $_POST['username'];
$password = $_POST['password'];

// SQL to check the user
$sql = "SELECT * FROM users WHERE username = '$username' AND password = MD5('$password')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    setcookie("username", $username, time() + 3600); // 1-hour expiration
    header("Location: index.html");
    exit();
} else {
    echo "<script>alert('Invalid credentials!'); window.location = 'index.html';</script>";
}

$conn->close();
?>
