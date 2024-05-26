<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost"; // Change this to your database server
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "productsmanagement"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get username and password from form
    $Username = $_POST["username"];
    $Password = $_POST["password"];

    // Prepare SQL statement
    $sql = "SELECT * FROM users WHERE name = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $Username, $Password);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Set session variable
        $_SESSION["username"] = $Username;

        // Create a cookie with the username
        setcookie("username", $Username, time() + 60); // Expires in 1 minute

        // Display confirmation message
        echo "<script>alert('Cookie created for username: " . $Username . "');";
        echo "window.location.href = 'dashboard.html';</script>"; // Redirect to dashboard after alert
        exit;
    } else {
        echo "<script>alert('Incorrect password. Please try again.');";
        echo "window.location.href = 'login.html';</script>"; // Redirect to login page after alert
        exit;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
