<?php
// Include database connection
include_once "db.php";

// Include session management file
include_once "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products - Salman Store</title>
    <style>
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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .product-card {
            width: 100px;
            height: 200px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }
        .product-card:hover {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .product-card img {
            max-width: 100%;
            height: auto;
        }
        .product-details {
            margin-top: 10px;
            text-align: center;
        }
        .product-name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .product-price {
            color: #009900;
        }
        .add-to-cart {
            margin-top: 10px;
            background-color: #009900; /* Green */
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .add-to-cart:hover {
            background-color: #007700;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-brand">Salman Store</div>
        <div class="navbar-links">
            <a href="home.php">Home</a>
            <span style="color: #ddd;">View Products</span>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <h2>View Products</h2>
        <ul class="product-list">
            <?php
            // Fetch products from database
            $sql = "SELECT * FROM Product";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <li>
                        <div class="product-card">
                            <img src="<?php echo $row['imgLink']; ?>" alt="<?php echo $row['name']; ?>">
                            <div class="product-details">
                                <div class="product-name"><?php echo $row['name']; ?></div>
                                <div class="product-price">$<?php echo $row['price']; ?></div>
                                <div class="product-unit"><?php echo $row['unit']; ?></div>
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            } else {
                echo "<p>No products found</p>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
