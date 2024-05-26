<?php
include 'session_check.php';
?>
<?php
include 'connection.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .container {
            display: flex;
            height: 100%;
        }

        .image-container {
            flex: 1;
            background-image: url('<?php echo htmlspecialchars($product['image_path']); ?>');
            background-size: cover;
            background-position: center;
        }

        .details-container {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            /* Add scrolling to the details container if content is too long */
        }
    </style>
</head>

<body>
    <?php if ($product) : ?>
        <div class="container">
            <div class="image-container">
                <!-- Image is set as a background to fill the div -->
            </div>
            <div class="details-container">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p>Brand: <?php echo htmlspecialchars($product['brand']); ?></p>
                <p>Price: $<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></p>
            </div>
        </div>
    <?php else : ?>
        <p>Product not found.</p>
    <?php endif; ?>
</body>

</html>