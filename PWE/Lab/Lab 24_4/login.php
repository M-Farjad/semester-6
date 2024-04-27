<?php
session_start();

// Simulate database (replace with your database connection)
$users = [
    'user1' => 'password1',
    'user2' => 'password2'
];

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($users[$username]) && $users[$username] === $password) {
    $_SESSION['username'] = $username;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'User does not exist']);
}
