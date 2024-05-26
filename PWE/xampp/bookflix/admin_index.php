<?php include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}


$users_no = $conn->query("SELECT * FROM users_info ") or die('query failed');
$usercount = mysqli_num_rows( $users_no );
$admin_no = $conn->query("SELECT * FROM users_info WHERE user_type='Admin' ") or die('query failed');
$admin_count = mysqli_num_rows( $admin_no );
$books_no = $conn->query("SELECT * FROM book_info ") or die('query failed');
$bookscount = mysqli_num_rows( $books_no );
$orders = $conn->query("SELECT * FROM confirm_order ") or die('query failed');
$orders_count = mysqli_num_rows( $orders );
$msg_no = $conn->query("SELECT * FROM msg ") or die('query failed');
$msgcount = mysqli_num_rows( $msg_no );

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./css/admin.css" />
    <title>Bookflix & Chill Admin</title>
  </head>

  <body >
    <?php include'admin_header.php';?>
    <br/>
    
    <div class="main_box">
      <div class="card" style="width: 15rem">
      <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `confirm_order` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         
        <img class="card-img-top" src="./images/pen3.png" alt="Card image cap" /> 
        <div class="card-body">
          <h5 class="card-title">Number Of Pending Orders in ₨</h5>
          <p class="card-text"> 
          <?php echo $total_pendings ?>
          </p>
          <div class="buttons" style="display: flex;">
          <a href="admin_orders.php" class="btn btn-primary">Details</a>
          </div>
        </div>
      </div>
      <div class="card" style="width: 15rem">
      <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `confirm_order` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
        <img class="card-img-top" src="./images/compn.png" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Number Of Completed Orders in ₨</h5>
          <p class="card-text">
          <?php echo $total_completed; ?>
          </p>
          <div class="buttons" style="display: flex;">
          <a href="admin_orders.php" class="btn btn-primary">Details</a>
          </div>
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img class="card-img-top" src="./images/orderpn.png" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Number Of Orders Recived</h5>
          <p class="card-text">
          <?php echo $orders_count; ?>
          </p>
          <a href="admin_orders.php" class="btn btn-primary">Details</a>
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img class="card-img-top" src="./images/nu. books.png" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Number Of Books Available</h5>
          <p class="card-text">
          <?php echo $bookscount; ?>
          </p>
          <div class="buttons" style="display: flex;">
          <a href="total_books.php" class="btn btn-primary">See Books</a>
          <a href="add_books.php" class="btn btn-primary">Add Books</a>
          </div>
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img class="card-img-top" src="./images/whatpm.png" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Number Of Users Queries</h5>
          <p class="card-text">
          <?php echo $msgcount; ?>
          </p>
          <a href="message_admin.php" class="btn btn-primary">Details</a>
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img class="card-img-top" src="./images/adminpn2.png" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Number Of Registered Admins</h5>
          <p class="card-text">
            <?php echo $admin_count; ?>
          </p>
          <a href="users_detail.php" class="btn btn-primary">Details</a>
        </div>
      </div>
      <div class="card" style="width: 15rem">
        <img class="card-img-top" src="./images/userspm.png" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">Number Of Registered Users</h5>
          <p class="card-text">
            <?php echo $usercount; ?>
          </p>
          <a href="users_detail.php" class="btn btn-primary">Details</a>
        </div>
      </div>
    </div>
  </body>
</html>
