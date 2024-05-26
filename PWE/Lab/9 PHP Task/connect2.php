<?php
include_once('connection.php');

$s = "select * from student";
$rs = mysqli_query($link, $s);
?>

<html>

<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/mystyle.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		table {
			border-collapse: no-collapse;
		}

		td,
		th {
			padding: 3px 5px;
		}

		th {
			padding: 7px;
			background-color: #8e72cf;
		}
	</style>
</head>

<body class="container">
	<table border=1 class="table table-hover">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Gender</th>
			<th>Country</th>
			<th>Number</th>
		</tr>
		<?php

		while ($rows = mysqli_fetch_assoc($rs)) {
		?>
			<tr>
				<td><?php echo $rows['id']; ?> </td>
				<td><?php echo $rows['Name']; ?> </td>
				<td><?php echo $rows['Email']; ?> </td>
				<td><?php echo $rows['Password']; ?> </td>
				<td><?php echo $rows['Gender']; ?> </td>
				<td><?php echo $rows['Country']; ?> </td>
				<td><?php echo $rows['Number']; ?> </td>
			</tr>
		<?php
		}
		?>
	</table>
</body>

</html>