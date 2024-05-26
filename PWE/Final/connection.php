<?php
$servername = "localhost";
$username = "root"; // Your DB username
$password = ""; // Your DB password
$database = "finalDB"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
