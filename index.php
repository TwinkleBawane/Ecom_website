<?php 
session_start();
include('connect.php');


if (!empty($_SESSION['id']))   // ! = not
{
	header('location:home.php');
}

if (isset($_POST['login']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$sql = mysqli_query($con,"SELECT * FROM `register` WHERE `contact` = '$user' AND `pass` = '$pass'");   // `register` table name `contact` column name
	$row = mysqli_num_rows($sql);

	while ($result = mysqli_fetch_assoc($sql))
	{
		$_SESSION['id'] = $result['id'];
		$_SESSION['name'] =  $result['name'];
	}

	if ($row>0)
	{
		echo "<script>
		alert('Yes login Success...');
		window.location.href='home.php';
		</script>";
	}

	else
	{
		echo "<script>
		alert('Invalid password...');
		</script>";

	}


}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User logic page</title>
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
			<div class="col-sm-4">
				
			</div>
			<div class="col-sm-4">
				<!-- user login form start -->
				<form method="post">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>User Login</h3>
						</div>
						<div class="panel-body">
							<label>Username</label>
							<input type="text" name="user" class="form-control" placeholder="Enter Username" required>
							<br>
							<label>Password</label>
							<input type="password" name="pass" class="form-control" placeholder="Enter Password" required>
						</div>
						<div class="panel-footer">
							<button type="submit" name="login" class="btn btn-success btn-block">LOGIN</button>
							<br>
							<hr>
							<p align="center">
								Go to <a href="admin/">Admin Panel</a>
							</p>
							<br>
							<p>
								Not Register..?<a href="register.php">Sign up</a> here
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