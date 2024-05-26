<?php
include_once('connection.php');

$s = "select * from student";
$rs = mysqli_query($link, $s);
?>

<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="container">
	<table class="table table-hover">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Password</th>
		</thead>
		<?php
		while ($rows = mysqli_fetch_assoc($rs)) {
		?>
			<tr>
				<td><?php echo $rows['id']; ?> </td>
				<td><?php echo $rows['name']; ?> </td>
				<td><?php echo $rows['password']; ?> </td>
			</tr>
		<?php
		}
		?>
	</table>
</body>

</html>