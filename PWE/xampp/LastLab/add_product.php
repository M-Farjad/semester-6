<?php
// Include database connection
include_once "db.php";

// Include session management file
include_once "session.php";

// Check if user is not logged in, redirect to login page
if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

// Define variables and initialize with empty values
$name = $price = "";
$nameErr = $priceErr = $imageErr = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate price
    if (empty($_POST["price"])) {
        $priceErr = "Price is required";
    } else {
        $price = test_input($_POST["price"]);
        // Check if price is a valid number
        if (!is_numeric($price)) {
            $priceErr = "Price must be a valid number";
        }
    }

    // Validate image
    if (empty($_FILES["image"]["name"])) {
        $imageErr = "Image is required";
    } else {
        // Check if file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $imageErr = "File is not an image";
        } else {
            // Generate unique filename
            $email = $_SESSION['user_id']; // Assuming user_id is unique
            $currentDateTime = date('YmdHis');
            $fileExtension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            $targetFile = "upload/${email}_${currentDateTime}.${fileExtension}";


            // Move uploaded file to destination
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Insert product into database
                $sql = "INSERT INTO Product (name, price, unit, imgLink) VALUES ('$name', '$price', '$','$targetFile')";
                if ($conn->query($sql) === true) {
                    echo "<script>alert('Product added successfully');</script>";
                    header("Location: home.php");
                    exit;
                } else {
                    echo "<script>alert('Error adding product to database');</script>";
                }
            } else {
                $imageErr = "Error uploading file: " . $_FILES["image"]["error"];
            }
        }
    }

    // Display validation errors
    if (!empty($nameErr) || !empty($priceErr) || !empty($imageErr)) {
        echo "<script>alert('$nameErr\\n$priceErr\\n$imageErr');</script>";
    }
}

// Function to sanitize input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
