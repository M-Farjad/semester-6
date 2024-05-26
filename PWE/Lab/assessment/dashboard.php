<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit;
}

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

    // Get product details from form
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];

    // File upload handling
    if ($_FILES["product_image"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        
        // Move uploaded file
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            // Insert product into database
            $stmt = $conn->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $product_name, $product_price, $target_file);
            if ($stmt->execute()) {
                echo "Product added successfully.";
                $stmt->close();
                // Redirect to dashboard
                header("Location: dashboard.html");
                exit;
            } else {
                echo "Error adding product to the database.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "An error occurred during file upload.";
    }

    // Close connection
    $conn->close();
}
?>
