<?php
session_start();
include 'connection.php';

if (isset($_SESSION['admin_logged_in'])) {
    header("Location: show_products.php");
    exit();
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];  // In production, use password hashing and verification here

    $sql = "SELECT * FROM admins WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true; // Set session variable for logged in status
        $_SESSION['username'] = $username;   // Optionally store the username or other user data
        header("Location: show_products.php");
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}
?>
<!-- Your HTML login form here -->

<html>

<body>
    <center>
        <form method="post">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
    </center>
</body>

</html>