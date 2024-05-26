<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user = "root";
$password = "";
$db = "HostelManagementSystem";
$server = "localhost";

$link = mysqli_connect($server, $user, $password);
if (!$link) {
    die("Could not connect to SQL server: " . mysqli_connect_error());
}

if (!mysqli_select_db($link, $db)) {
    die("Could not open DB: " . mysqli_error($link));
}

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['roll_number'])) {
    $roll_number = $_GET['roll_number'];
    $query = "SELECT * FROM Students WHERE roll_number = '$roll_number'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $email = $row['email'];
        $address = $row['address'];
        $department = $row['department'];
        $room_allocated = $row['room_allocated'];
        $bill_paid = $row['bill_paid'];
    } else {
        echo "Student not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_number = $_POST['roll_number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $room_allocated = $_POST['room_allocated'];
    $bill_paid = isset($_POST['bill_paid']) ? 1 : 0;

    $query = "UPDATE Students SET name='$name', email='$email', address='$address', department='$department', room_allocated='$room_allocated', bill_paid='$bill_paid' WHERE roll_number='$roll_number'";
    $result = mysqli_query($link, $query);

    if ($result) {
        header("location: home.php");
    } else {
        echo "Error updating student information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid white;
            border-radius: 5px;
            margin-left: 20px;
        }

        header a:hover {
            background-color: white;
            color: #4CAF50;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="checkbox"] {
            width: calc(100% - 22px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Student</h1>
        <a href="home.php">Back to Home</a>
    </header>

    <form action="" method="post">
        <input type="hidden" name="roll_number" value="<?php echo $roll_number; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>" required>
        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="<?php echo $department; ?>" required>
        <label for="room_allocated">Room Allocated:</label>
        <input type="text" id="room_allocated" name="room_allocated" value="<?php echo $room_allocated; ?>" required>
        <label for="bill_paid">Bill Paid:</label>
        <input type="checkbox" id="bill_paid" name="bill_paid" <?php echo $bill_paid == 1 ? 'checked' : ''; ?>>
        <input type="submit" value="Update">
    </form>
</body>
</html>
