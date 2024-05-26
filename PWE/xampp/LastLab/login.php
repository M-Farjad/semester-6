<?php
// Include database connection
include_once "db.php";

// Include session management file
include_once "session.php";

// Check if user is already logged in
if (isLoggedIn()) {
    // Redirect to homepage if already logged in
    header("Location: home.php");
    exit;
}

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email and password
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Simple email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {
        // Check login credentials
        $sql = "SELECT * FROM User WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Login successful
            loginUser($row['user_id']); // Set user session
            header("Location: home.php"); // Redirect to homepage
            exit;
        } else {
            // Login failed
            $error = "Invalid email or password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #009900; /* Green */
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #009900; /* Green */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #007700;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" onsubmit="func()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <?php if(isset($error) && !empty($error)) { ?>
                <div class="error"><?php echo $error; ?></div>
            <?php } ?>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
