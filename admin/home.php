<?php 
session_start();
include('../connect.php');

if (empty($_SESSION['aname']))   
{
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Home Page</title>
	<?php include('../bootcdn.php') ?>
	<style type="text/css">
		body {background-image: cat.jpeg;}
	</style>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

		<div class="well">
			<span class="glyphicon glyphicon-home"></span>
			<b>HOME PAGE</b>
		</div>


		<!-- dashboard start  -->
		<div class="row">
			<h4>Users list : </h4>
			<div class="col-sm-3">
				<div class="well text-center">
					<span style="font-size: 30px;" class="glyphicon glyphicon-user"></span>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM register");
					$result = mysqli_num_rows($sql);
					?>
					<h4>Users - <?php echo $result ?></h4>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="well text-center">
					<span style="font-size: 30px;" class="glyphicon glyphicon-time"></span>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM register WHERE rdate= '".date('Y-m-d')."' ");
					$result = mysqli_num_rows($sql);
					?>
					<h4>Today's Users - <?php echo $result ?></h4>
				</div>
			</div>


		</div>
		<hr>
		<br>




		<div class="row">
			<h4>Product list :</h4>

               <div class="col-sm-3">
				<div class="well text-center">
					<span style="font-size: 30px;" class="glyphicon glyphicon-th"></span>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM products");
					$result = mysqli_num_rows($sql);
					?>
					<h4>Total Products - <?php echo $result ?></h4>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="well text-center">
					<span style="font-size: 30px;" class="glyphicon glyphicon-time"></span>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM products WHERE udate= '".date('Y-m-d')."' ");
					$result = mysqli_num_rows($sql);
					?>
					<h4>Today's Products - <?php echo $result ?></h4>
				</div>
			</div>


		</div>

		<hr>

		<div class="row">
			<h4>Purchase list :</h4>

               <div class="col-sm-3">
				<div class="well text-center">
					<span style="font-size: 30px;" class="glyphicon glyphicon-list"></span>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM purchase");
					$result = mysqli_num_rows($sql);
					?>
					<h4>Total Purchase - <?php echo $result ?></h4>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="well text-center">
					<span style="font-size: 30px;" class="glyphicon glyphicon-time"></span>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM purchase WHERE pdate= '".date('Y-m-d')."' ");
					$result = mysqli_num_rows($sql);
					?>
					<h4>Today's Purchase - <?php echo $result ?></h4>
				</div>
			</div>


		</div>
		<!-- dashboard end  -->

		


	</div>

</body>
</html>