<?php
include 'session_check.php';
?>
<?php
include 'connection.php';

// Delete product
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: show_products.php");
}

// Fetch products
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Products</title>
    <style>
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <a href="logout.php" class="btn btn-danger logout-button">Logout</a>
        <a href="insert_product.php" class="btn btn-primary">Insert Products</a>
        <h2>Product List</h2>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Product Image" style="width:100px; height:auto;"></td>
                        <!-- Make the product name a link to the product detail page -->
                        <td><a href="product_detail.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></a></td>
                        <td><?php echo htmlspecialchars($row['brand']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td>
                            <a href="update_product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>