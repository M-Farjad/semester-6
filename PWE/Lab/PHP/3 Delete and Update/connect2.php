<?php
include 'connect.php';

$s = "select id,name from student";
$rs = mysqli_query($link, $s);
?>

<table border="2px" width="350px" height="200px" align="center">
    <thead>
        <td>ID</td>
        <td>NAME</td>
        <!-- <td>PASSWORD</td> -->
        <td>DELETE</td>
        <td>EDIT</td>
    </thead>
    <?php
    while ($rows = mysqli_fetch_array($rs)) {
        $id = $rows['id'];
        $name = $rows['name'];
        // $password = $rows['password'];
    ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <!-- <td><?php echo $password; ?></td> -->
            <td><a href="del.php? id=<?php echo $id ?>" />DEL</a></td>
            <td><a href="update.php? id=<?php echo $id ?>" />EDIT</a></td>
        </tr>
    <?php
    }
    ?>
</table>