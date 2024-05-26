<?php
// Include session management file
include_once "session.php";

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit;
?>
