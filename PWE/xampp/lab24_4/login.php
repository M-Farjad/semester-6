<?php
session_start();

// Simulated database connection
$users = [
    'user1' => 'password',
    'user2' => 'password'
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (array_key_exists($username, $users) && $users[$username] == $password) {
    $_SESSION['username'] = $username;
    echo json_encode(['success' => true, 'redirect' => 'profile.php']);
} else {
    echo json_encode(['success' => false, 'message' => 'User does not exist']);
}
?>