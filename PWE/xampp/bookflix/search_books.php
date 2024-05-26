<?php
include 'config.php';

session_start();

if(isset($_SESSION['user_name'])){
   $user_id = $_SESSION['user_id'];
   
if (isset($_POST['add_to_cart'])) {
   $book_name = $_POST['book_name'];
   $book_id= $_POST['book_id'];
   $book_image = $_POST['book_image'];
   $book_price = $_POST['book_price'];
   $book_quantity = '1';

   $total_price = number_format($book_price * $book_quantity);
   $select_book = $conn->query("SELECT * FROM cart WHERE bid= '$book_id' AND user_id='$user_id' ") or die('query failed');

   if (mysqli_num_rows($select_book) > 0) {
       $message[] = 'This Book is alredy in your cart';
   } else {
   $conn->query("INSERT INTO cart (`user_id`,`book_id`,`name`, `price`, `image`,`quantity` ,`total`) VALUES('$user_id','$book_id','$book_name','$book_price','$book_image','$book_quantity', '$total_price')") or die('Add to cart Query failed');
   $message[] = 'Book Added To Successfully';
   header('location:index.php');
   }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      .search-form form {
         max-width: 1200px;
         margin: 30px auto;
         display: flex;
         gap: 15px;
      }

      .search-form form .search_btn {
         margin-top: 0;
      }

      .search-form form .box {
         width: 100%;
         padding: 12px 14px;
         border: 2px solid rgb(0, 167, 245);
         font-size: 20px;
         color: black;
         border-radius: 5px;
      }

      .search_btn {
         display: inline-block;
         padding: 10px 25px;
         cursor: pointer;
         color: white;
         font-size: 18px;
         border-radius: 5px;
         text-transform: capitalize;
         background-color: rgb(0, 167, 245);
      }
   </style>
</head>

<body>

   <?php include 'index_header.php'; ?>

   <section class="search-form">

      <form action="" method="POST">
         <input type="text" class="box" name="search_box" placeholder="search products...">
         <input type="submit" name="search_btn" value="search" class="search_btn">
      </form>

   </section>

   <div class="msg">
      <?php
      if (isset($_POST['search_btn'])) {
         $search_box = $_POST['search_box'];
         
         echo '<h4>Search Result for "'. $search_box.'"is:</h4>';
      };
      ?>
   </div>
   <section class="show-products">
      <div class="box-container">

         <?php
         if (isset($_POST['search_btn'])) {
            $search_box = $_POST['search_box'];

            $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
            $select_products = mysqli_query($conn, "SELECT * FROM `book_info` WHERE name LIKE '%{$search_box}%' OR title LIKE '%{$search_box}%' OR category LIKE '%{$search_box}%'");
            if (mysqli_num_rows($select_products) > 0) {
               while ($fetch_book = mysqli_fetch_assoc($select_products)) {
         ?>

                  <div class="box" style="width: 255px;height: 342px;">
                     <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                         echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 125px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                     <div style="text-align:left ;">
                        <div class="name" style="font-size: 12px;">Aurthor: <?php echo $fetch_book['title']; ?></div>
                        <div style="font-weight: 500; font-size:18px; " class="name">Name: <?php echo $fetch_book['name']; ?></div>
                     </div>
                     <div class="price">Price: ₹ <?php echo $fetch_book['price']; ?>/-</div>
                     <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                     <form action="" method="POST">
                        <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                        <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                        <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                        <button onclick="myFunction()" name="add_to_cart"><img src="./images/cart2.png" alt="Add to cart">
                           <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                               echo '-name=', $fetch_book['name']; ?>" id="adventure" class="update_btn">Know More</a>
                     </form>
                  </div>
         <?php
               }
            } else {
               echo '<p class="empty">Could not find "'. $search_box.'"! </p>';
            }
         };
         ?>
      </div>
   </section>




   <?php include 'index_footer.php'; ?>

   <script src="js/script.js"></script>

</body>

</html>