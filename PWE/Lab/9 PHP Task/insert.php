<?php
include_once('connection.php');

$name = $_POST['myname'];
$email = $_POST['myemail'];
$password = $_POST['mypassword'];
$gender = $_POST['mygender'];
$country = $_POST['mycountry'];
$number = $_POST['mynumber'];
if ($name !== "" && $email != "" && $password !== "" && $gender !== "" && $country !== "" && $number !== "") {
	$q = "insert into student (Name, Email, Password, Gender, Country, Number) values ('$name', '$email', '$password', '$gender', '$country', '$number')";
	$bol = mysqli_query($link, $q);

	if ($bol) {
		echo "Records Have been Entered";
	}
} else {
	echo ("form is empty");
}




?>

<html>

<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/mystyle.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		h1 {
			text-align: center;
		}

		form {
			width: 500px;
			margin: auto;
		}

		label {
			display: block;
			margin-top: 1rem;
		}

		input[type="submit"] {
			margin-top: 1rem;
			background-color: blue;
			color: white;
		}

		input,
		select {
			width: 13rem;
			padding: 5px;
		}
	</style>

	<script>
		function myFunction() {
			let name = document.getElementById('myname').value;
			let email = document.getElementById('myemail').value;
			let password = document.getElementById('mypassword').value;
			let gender = document.getElementById('mygender').value;
			let country = document.getElementById('mycountry').value;
			let number = document.getElementById('mynumber').value;

			if (name == '')
				alert('Name is empty')
			if (email == '')
				alert('Email is empty')
			if (password == '')
				alert('Password is empty')
			if (gender == '')
				alert('Gender is empty')
			if (country == '')
				alert('Country is empty')
			if (number == '')
				alert('Number is empty')

			// Name and Country only contains alphabets
			if (!isNaN(name)) {
				alert('Only enter alphabets in name')
			}
			if (!isNaN(country)) {
				alert('Only enter alphabets in country')
			}

			// Password should be of length at-least 6
			if (password.length < 6) {
				alert('Password must contains at least 6 characters')
			}

			// Phone number only contains numbers
			if (isNaN(number)) {
				alert('Phone number must only contains digits')
			}

			// Length of phone number should be 11
			if (number.length != 11) {
				alert('Phone number must contains at least 11 digits')
			}

			// Email validation
			if (!email.includes('@') || !email.includes('.')) {
				alert('Email is wrong')
			}

		}
	</script>
</head>

<body class="container">
	<br /><br />

	<h1>Registration Number</h1>

	<form method="post" action="">

		<label>Name:</label>
		<input type="text" name="myname" id="myname" placeholder="Enter Your Name" class="form-control" />
		<br />

		<label>Email Address:</label>
		<input type="email" name="myemail" id="myemail" placeholder="Enter Your email address" class="form-control" />
		<br />

		<label>password:</label>
		<input type="password" name="mypassword" id="mypassword" placeholder="Enter Your Password" class="form-control" />
		<br />

		<label>Gender:</label>
		<select name="mygender" name="mygender" id="mygender" class="form-control">
			<option value="" selected disabled>Select Gender</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="prefer not to say">Prefer not to say</option>
		</select> <br>

		<label>Country:</label>
		<input type="text" name="mycountry" id="mycountry" placeholder="Enter Your country" class="form-control" />
		<br />

		<label>Phone Number:</label>
		<input type="text" name="mynumber" id="mynumber" placeholder="Enter Your Phone Number" class="form-control" />
		<br />



		<input type="submit" value="Register" class="btn btn-primary" onClick="myFunction()" />

		<p>Want to see registered users detail? <a target="_blank" href="connect2.php">User Record</a></p>
	</form>
</body>

</html>