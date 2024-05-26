<?php
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

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<img src='" . $row["image"] . "' alt='Product Image'>";
        echo "<h3>" . $row["name"] . "</h3>";
        echo "<p>Price: $" . $row["price"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

// Close connection
$conn->close();
?>
