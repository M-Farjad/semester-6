<?php
include 'session_check.php';
?>
<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    // Collect product data from form
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $imageName = time() . '_' . $image['name']; // Generate a unique file name
        $imagePath = 'images/' . $imageName; // Define path to store the image
        
        // Validate uploaded file is an image
        if (getimagesize($image['tmp_name'])) {
            // Check and create image directory if it doesn't exist
            if (!file_exists('images')) {
                mkdir('images', 0777, true);
            }

            // Attempt to move the uploaded file to the designated folder
            if (move_uploaded_file($image['tmp_name'], $imagePath)) {
                // Prepare SQL query to insert product details into the database, including image path
                $stmt = $conn->prepare("INSERT INTO products (name, brand, description, price, image_path) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssds", $name, $brand, $description, $price, $imagePath);
                $stmt->execute();

                // Check if the insert was successful
                if ($stmt->affected_rows > 0) {
                    echo "Product added successfully!";
                } else {
                    echo "Failed to add product.";
                }
            } else {
                echo "Failed to upload image.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "Error in uploading image or no image provided.";
    }
}
?>

<html>
<head>
    <title>Insert Product</title>
</head>
<body>
    <h1>Insert Product</h1>
    <form method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name"><br>
        Brand: <input type="text" name="brand"><br>
        Description:<br> <textarea name="description"></textarea><br>
        Price: <input type="text" name="price"><br>
        Image: <input type="file" name="image"><br>
        <input type="submit" name="submit" value="Insert Product">
    </form>
</body>
</html>
