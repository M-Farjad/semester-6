<?php
session_start();

// Check if last activity time is set
if (isset($_SESSION['last_activity'])) {
    // Check if session expired (1 minute inactivity)
    $inactive_time = time() - $_SESSION['last_activity'];
    if ($inactive_time > 60) {
        // Session expired, destroy session and redirect to login page
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

// Update last activity time
$_SESSION['last_activity'] = time();
?>
