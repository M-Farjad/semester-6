<?php
include 'connect.php';
$s = "select * from info";
$rs = mysqli_query($link, $s);

// $rows = mysqli_fetch_assoc($rs);
// echo $rows['pic_name'];

?>
<html>

<body>
    <!-- <img src="pic/<?php echo $rows['pic_name']; ?>" width="10%" height="10%" /> -->
    <?php
    while ($rows = mysqli_fetch_assoc($rs)) { // Loop through all rows
        echo '<img src="pic/' . htmlspecialchars($rows['pic_name']) . '" width="50%" height="50%" /><br>'; // Display each image
    }
    ?>
</body>

</html>