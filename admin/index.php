<?php 
session_start();

if (isset($_POST['login']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	if ($user=='Admin' && $pass=='admin123')
	{
		$_SESSION['aname'] = $user;
		header('location:home.php');
	}

	else
	{
		echo "<script>
		alert('Invalid Password..';)
		</script>";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin login page</title>
	<?php include('../bootcdn.php') ?>
	<style type="text/css">
		body {background-image: url('../images/ecom4.JPEG');  /* ../ means 2 step back */
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
					<div class="panel panel-default" style="background: transparent;">
						<div class="panel-heading">
							<h3>Admin Login</h3>
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
								Go to <a href="../">User Panel</a>
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