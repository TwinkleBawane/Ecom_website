<?php 
session_start();
include('connect.php');

if (empty($_SESSION['id']))   
{
	header('location:index.php');
}

if (isset($_POST['btn1']))
{
	$pdate = $_POST['pdate'];
	$uid = $_POST['uid'];
	$uname = $_POST['uname'];
	$proid = $_POST['proid'];

	mysqli_query($con,"INSERT INTO purchase(pdate,uid,uname,proid) VALUES('$pdate','$uid','$uname','$proid') ");

	echo "<script>
	alert('successfuly purchase new product...');
	window.location.href='search.php';
	</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Search Page</title>
	<?php include('bootcdn.php') ?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

		<div class="well">
			<span class="glyphicon glyphicon-search"></span>
			<b>SEARCH PAGE</b>
		</div>

		<!-- Product list start section  -->


		<div class="row hidden-print">
			<form method="post">
			<div class="col-sm-3">
				<input type="text" name="search" class="form-control" placeholder="Product search here...">


             


			</div>
			<div class="col-sm-1">
				<button type="submit" name="btn" class="btn btn-primary">
					<span class="glyphicon glyphicon-search"> Search </span>
				</button>
			</div>
		</form>
		</div>
		<br>


		<!-- table start -->
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Product Id</th>
						<th>Upload Date</th>
						<th>Product title</th>
						<th>Product Description</th>
						<th>Photo</th>
						<th>Price</th>
						<th>Action</th>
					</tr>

					<tbody id="myTable">
						<?php 
						if (isset($_POST['btn']))
						{
							$search = $_POST['search']; 
						
						$sdata = mysqli_query($con,"SELECT * FROM products WHERE title LIKE '%".$search."%' ");
						while ($row = mysqli_fetch_assoc($sdata))
					{
						?>
						<tr>
							<td><?php echo $row['pid'] ?></td>
							<td><?php echo $row['udate'] ?></td>
							<td><?php echo $row['title'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<td>

								<img src="<?php echo 'admin/imgs/'.$row['photo'] ?>" width="80px">
									
								</td>
							<td><?php echo $row['price'] ?></td>
							<td>
							<form method="post">
								<!-- hidden inputs start -->
								<input type="hidden" name="pdate" value="<?php echo date('Y-m-d')?>">
								<input type="hidden" name="uid" value="<?php echo $_SESSION['id']?>">
								<input type="hidden" name="uname" value="<?php echo $_SESSION['name']?>">
								<input type="hidden" name="proid" value="<?php echo $row['pid']?>">
								<!-- hidden inputs end -->
								<button type="submit" name="btn1" class="btn btn-primary">Purchase</button>

							</form>
						</td>

						</tr>
						
						<?php 
					}}
						?>

					</tbody>

				</thead>
			</table>
		</div>
		<!-- table end -->


		<!-- Product list end section  -->
		
	</div>

</body>
</html>