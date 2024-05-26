<!-- <?php 
// session_start();
// if(isset($_GET['logout'])){
//     header('location:login.php');
// }
// ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Admin Page</title>
</head>
<body>
    
<header><div class="mainlogo">
        <div class="logo">
            <a href="admin_index.php"><span>Bookflix &</span>
            <span class="me">Chill</span></a>
        </div><p>Admin Pannel</p></div>
        <div class="nav">
            <a href="admin_index.php">Home</a>
            <a href="add_books.php">Add Books</a>
            <a href="admin_orders.php">Orders</a>
            <a href="message_admin.php">Message</a>
            <a href="users_detail.php">Users</a>

        </div>
        <div class="right">
            <div class="log_info">
                <p>Hello <?php echo $_SESSION['admin_name'];?></p> 
            </div>
            <a class="Btn" href="logout.php?logout=<?php echo $_SESSION['admin_name'];?>">logout</a>
        </div>
    </header>

</body>
</html>