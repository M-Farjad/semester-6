<?php
$servername = "localhost";
$username = "root";
$password = "";  // default password for XAMPP is empty
$dbname = "admin_panel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
