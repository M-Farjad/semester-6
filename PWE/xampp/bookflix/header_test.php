

<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" href="./css/hello.css">
  <style>
    .sub-menu-wrap{
position: absolute;
top: 10%;
right: 10%;
width: 320px;
max-height: 0px;
overflow: hidden;
transition: max-height 0.5s;
}
.sub-menu-wrap.open-menu{ max-height: 400px;
}
.sub-menu{
background: #fff;
padding: 20px;
margin: 10px;}
.user-info{
display: flex;
align-items: center;
}
.user-info h3{
font-weight: 500;
}
.user-info img{
width: 60px;
border-radius: 50%;
margin-right: 15px;
}
.sub-menu hr{
border: 0;
height: 1px;
width: 100%;
background: #ccc;
margin: 15px 10px;
}
.sub-menu-link{
display: flex;
align-items: center;
text-decoration: none;
color: #525252;
margin: 12px e;
}
.sub-menu-link p{
width: 100%;
}
.sub-menu-link img{
width: 40px;
background: #e5e5e5;
border-radius: 50%;
padding: 8px;
margin-right: 15px;
}
.sub-menu-link span{
font-size: 22px;
transition: transform 0.5s;
}
.sub-menu-link:hover span{
transform: translateX(5px);
}
.sub-menu-link:hover p{
font-weight: 600;
}
  </style>
<body>
  <header>
    <div class="logo">
        <a href="index.php"><span>Read</span>
            <span class="me">Me</span></a>
    </div>
    <div class="nav">
        <a href="index.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn">Category🔻</button>
            <div class="dropdown-content">
                <a href="#">Adventure</a>
                <a href="#">Magic</a>
                <a href="#">Knowledge</a>
            </div>
        </div>
        <a href="contact-us.php">Contact US</a>
        <a href="cart.php">Cart</a>
        <a href="orders.php">Orders</a>
    </div>
    <div class="user-box" style="display: flex;">
    <a class="Btn" href="search_books.php"><img style="height:25px;" src="./images/search2.png" alt=""></a>
    <?php if(isset($_SESSION['user_name'])){echo' <img style="height:50px ;" src="images/user.png" class="user-pic" onclick="toggleMenu()" />';}
      else{
        echo'<a class="Btn" href="login.php">Login</a>';
        echo'<a class="Btn" href="register.php">Register</a>';

    }?>
        <!-- <?php if(isset($_SESSION['user_name'])){
           echo '<div class="user_info"><p>username: <span> '.$_SESSION['user_name'].'</span></p><p> email : <span>'.$_SESSION['user_email'].'</span></p></div>';
        //    echo '<p> email : <span>'.$_SESSION['user_email'].'</span></p>';
           echo '<a href="logout.php" class="delete-btn">logout</a>';
        }
        else{
            echo'<a class="Btn" href="login.php">Login</a>';
            echo'<a class="Btn" href="register.php">Register</a>';

        }?> -->
        
        <!-- <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p> -->
        <!-- <a href="logout.php" class="delete-btn">logout</a> -->
     </div>
</header>
  <img style="height:50px ;" src="images/user.png" class="user-pic" onclick="toggleMenu()" />
<div class="sub-menu-wrap" id="subMenu">
  <div class="sub-menu">
    <div class="user-info">
      <img src="images/user.png" />
      <h2>James Aldrino</h2>
    </div>
    <hr />
    I
    <a href="#" class="sub-menu-link">
      <p>Edit Profile</p>
      <span>></span>
    </a>
    <a href="#" class="sub-menu-link">
      <p>Cart</p>
      <span>></span>
    </a>
    <a href="#" class="sub-menu-link">
      <p>Order history</p>
      <span>></span>
    </a>
    <a href="#" class="sub-menu-link">
      <p>Logout</p>
      <span>></span>
    </a>
  </div>
</div>


<script>
  let subMenu = document.getElementById("subMenu");
  function toggleMenu(){ subMenu.classList.toggle("open-menu");
  }
  </script>
</body>
</html>
<!-- <img style="height:50px ;" src="images/user.png" class="user-pic" onclick="toggleMenu()" />
<div class="sub-menu-wrap" id="subMenu">
  <div class="sub-menu">
    <div class="user-info">
      <img src="images/user.png" />
      <h2>James Aldrino</h2>
    </div>
    <hr />
    I
    <a href="#" class="sub-menu-link">
      <p>Edit Profile</p>
      <span>></span>
    </a>
    <a href="#" class="sub-menu-link">
      <p>Cart</p>
      <span>></span>
    </a>
    <a href="#" class="sub-menu-link">
      <p>Order history</p>
      <span>></span>
    </a>
    <a href="#" class="sub-menu-link">
      <p>Logout</p>
      <span>></span>
    </a>
  </div>
</div> -->