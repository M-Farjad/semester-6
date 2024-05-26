<?php

// Start session
session_start();

// Include database connection
include_once "db.php";

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to login user
function loginUser($user_id) {
    $_SESSION['user_id'] = $user_id;
}

// Function to logout user
function logoutUser() {
    if (isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
        session_destroy();
    }
}

?>
