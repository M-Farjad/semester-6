<?php
// Include session management file
include_once "session.php";

// Check if user is not logged in, redirect to login page
if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Farjad Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #009900; /* Green */
            padding: 15px 0;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand {
            margin-left: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-links {
            margin-right: 20px;
        }
        .navbar-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }
        .navbar-links a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            background-color: #e0e0e0;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="file"],
        input[type="number"] {
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-brand">Farjad Store</div>
        <div class="navbar-links">
            <span style="color: #ddd;">Add Product</span>
            <a href="view_product.php">View Product</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <h2>Add Product</h2>
        <form id="addProductForm" action="add_product.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="image">Pick Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <button type="submit">Add Product</button>
            </div>
        </form>
    </div>
</body>
</html>
