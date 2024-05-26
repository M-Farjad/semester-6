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

// // Fetch admin's name from the database
// $query_admin = "SELECT name FROM Admin WHERE username = '$username'";
// $result_admin = mysqli_query($link, $query_admin);
// $admin_row = mysqli_fetch_assoc($result_admin);
// $admin_name = $admin_row['name'];

// if (!$result_admin) {
//     die("Query failed: " . mysqli_error($link));
// }

// Query for paid students
$query_paid = "SELECT * FROM Students WHERE bill_paid = 1";
$result_paid = mysqli_query($link, $query_paid);

if (!$result_paid) {
    die("Query failed: " . mysqli_error($link));
}

// Query for unpaid students
$query_unpaid = "SELECT * FROM Students WHERE bill_paid = 0";
$result_unpaid = mysqli_query($link, $query_unpaid);

if (!$result_unpaid) {
    die("Query failed: " . mysqli_error($link));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
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

        section {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .edit-link {
            color: #007bff;
            text-decoration: none;
        }

        .edit-link:hover {
            text-decoration: underline;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $username; ?></h1>
        <a href="logout.php">Sign Out</a>
    </header>

    <section>
        <h2>Students who have paid their mess bill</h2>
        <table>
            <thead>
                <tr>
                    <th>Roll Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Room Allocated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_paid)) { ?>
                    <tr>
                        <td><?php echo $row['roll_number']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['room_allocated']; ?></td>
                        <td><a href="student.php?roll_number=<?php echo $row['roll_number']; ?>" class="edit-link">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h2>Students who have not paid their mess bill</h2>
        <table>
            <thead>
                <tr>
                    <th>Roll Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Room Allocated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_unpaid)) { ?>
                    <tr>
                        <td><?php echo $row['roll_number']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['room_allocated']; ?></td>
                        <td><a href="student.php?roll_number=<?php echo $row['roll_number']; ?>" class="edit-link">Edit</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>
</html>
