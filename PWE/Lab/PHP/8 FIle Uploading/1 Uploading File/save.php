<?php
include 'connect.php';
$id = $_POST['id'];
$fname = $_POST['name'];
$file = $_FILES['pic'];

if ($_FILES['pic']['error'] == 0) {
    $temp = $_FILES['pic']['tmp_name'];
    $name = $_FILES['pic']['name'];
    $newname = time() . '_' . $name;
    $filepath = 'pic/' . $newname;
    $bol = move_uploaded_file($temp, $filepath);
    if ($bol) {
        // $q = "insert into info values ('$id', '$fname', '$newname')";
        $stmt = $link->prepare("INSERT INTO info (name, pic_name) VALUES (?, ?)");
        $stmt->bind_param("ss", $fname, $newname);
        $exec = $stmt->execute();
        if ($exec) {
            echo "</br><h3>Values Inserted Into DB</h3>";
        } else {
            echo "File Not Uploaded";
        }
        // $query = mysqli_query($link, $q);
        // if ($query) {
        //     echo "</br><h3>Values Inserted Into DB</h3>";
        // } else {
        //     echo "File Not Uploaded";
        // }
    }
}
