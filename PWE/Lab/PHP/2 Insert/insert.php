<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="container">
	<br /><br /><br /><br />
	<form method="post" action="./insert_data.php">
		<label>Name:</label>
		<input type="text" name="myname" id="myname" placeholder="Enter Your Name" class="form-control" />
		<br />
		<label>password:</label>
		<input type="password" name="mypassword" id="mypassword" placeholder="Enter Your Password" class="form-control" />
		<br />
		<button class="btn btn-primary">Insert Value</button>
	</form>
</body>

</html>