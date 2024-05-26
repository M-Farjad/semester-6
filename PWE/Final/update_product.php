<?php
include 'session_check.php';
?>
<?php
include 'connection.php';

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Collect form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Prepare SQL statement to update product details
    if ($stmt = $conn->prepare("UPDATE products SET name=?, brand=?, description=?, price=? WHERE id=?")) {
        // 'sssd' indicates the types of the variables: string, string, string, double, integer
        $stmt->bind_param("sssdi", $name, $brand, $description, $price, $id);
        if ($stmt->execute()) {
            echo "Product updated successfully!";
        } else {
            echo "Error updating product: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $stmt->close();
}

// Retrieve the product details to display in the form
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    if ($stmt = $conn->prepare("SELECT * FROM products WHERE id = ?")) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($product = $result->fetch_assoc()) {
            // Product data retrieved successfully
        } else {
            echo "No product found with that ID.";
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>

<html>

<head>
    <title>Update Product</title>
</head>

<body>
    <h1>Update Product</h1>
    <?php if (isset($product)) : ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
            Name: <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>"><br>
            Brand: <input type="text" name="brand" value="<?php echo htmlspecialchars($product['brand']); ?>"><br>
            Description:<br> <textarea name="description"><?php echo htmlspecialchars($product['description']); ?></textarea><br>
            Price: <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']); ?>"><br>
            <input type="submit" name="submit" value="Update Product">
        </form>
    <?php else : ?>
        <p>Please specify a product ID.</p>
    <?php endif; ?>
</body>

</html>