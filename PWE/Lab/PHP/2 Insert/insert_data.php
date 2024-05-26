<?php
include_once('connection.php');

$name = $_POST['myname'];
$password = $_POST['mypassword'];
if (empty($name) || empty($password)) {
	echo "Please fill in all fields";
}
if ($name !== "" && $password !== "") {
	$q = "insert into student (name,password) values ('$name', '$password')";
	$bol = mysqli_query($link, $q);

	if ($bol) {
		echo "Records Have been Entered";
	}
} else {
	echo ("form is empty");
}
?>