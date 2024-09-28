<?php
include('connect.php');

if(isset($_POST['reg']))
{
	$rdate = date('Y-m-d');
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	mysqli_query($con,"INSERT INTO register(rdate,name,contact,email,pass)VALUES('$rdate','$name','$contact','$email','$pass')");

	echo "<script>
	alert('Registration Successful...');
	window.location.href='index.php';
	</script>";
	

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Registration page</title>
	<?php include('bootcdn.php') ?>
	<style type="text/css">
		body {background-image: url('images/ecom1.JPG');
			background-attachment: fixed;
			background-size: cover;}

	
	</style>
</head>
<body>
	<div class="container">
		<br><br><br><br><br>

		<div class="row">
			<div class="col-sm-3">
				
			</div>
			<div class="col-sm-6">
				<!-- user login form start -->
				<form method="post">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>User Registration form</h3>
						</div>
						<div class="panel-body">
							<label>Entername</label>
							<input type="text" name="name" class="form-control" placeholder="Name" required>
							<br>
							<label>Contact No</label>
							<input type="number" name="contact" class="form-control" placeholder="Contact No" required>
							<br>
							<label>Email Address</label>
							<input type="email" name="email" class="form-control" placeholder="Enter Email" required>
							<br>
							<label>Set Password</label>
							<input type="text" name="pass" class="form-control" placeholder="Enter Password" required>
						</div>
						<div class="panel-footer">
							<button type="submit" name="reg" class="btn btn-success btn-block">Register</button>
							<br>
							<hr>
							<p align="center">
								Go to <a href="index.php">Login Panel</a>
							</p>
						</div>
					</div>
				</form>
				<!-- user login form end -->
			</div>
		</div>
	</div>

</body>
</html>