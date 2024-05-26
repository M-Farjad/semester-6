<?php
include 'connect.php';
$id = $_REQUEST['id'];

$q = "delete from student where id=" . $id;
$bol = mysqli_query($link, $q);
if ($bol)
    header("Refresh:0; url=connect2.php");
