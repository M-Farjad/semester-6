<?php
include 'db.php'; // Include your DB config file

$pname = $_POST['pname'];
$pprice = $_POST['pprice'];
$pimage = $_POST['pimage'];

// SQL to insert new product
$sql = "INSERT INTO products (name, price, image_url) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sds", $pname, $pprice, $pimage);

$response = [];
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>
