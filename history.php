<?php 
session_start();
include('connect.php');

if (empty($_SESSION['id']))   
{
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User History Page</title>
	<?php include('bootcdn.php') ?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

		<div class="well">
			<span class="glyphicon glyphicon-list"></span>
			<b>HISTORY PAGE</b>
		</div>

		<!-- History start -->
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>Purchase Id</th>
						<th>Purchase Date</th>
						<th>User Id</th>
						<th>User Name</th>
						<th>Product Id</th>
						<th>Product Name</th>
						<th>Description</th>
						<th>Photo</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = mysqli_query($con,"SELECT * FROM purchase WHERE uid = '".$_SESSION['id']."' ");
					while($pdata = mysqli_fetch_assoc($sql))
				    {
				     	$sql1 = mysqli_query($con,"SELECT * FROM products WHERE pid = '".$pdata['proid']."' ");
					while($pdata1 = mysqli_fetch_assoc($sql1))
					{
					
					?>
					<tr>
						<td><?php echo $pdata['pid']?></td>
						<td><?php echo $pdata['pdate']?></td>
						<td><?php echo $pdata['uid']?></td>
						<td><?php echo $pdata['uname']?></td>
						<td><?php echo $pdata['proid']?></td>
						<td><?php echo $pdata1['title']?></td>
						<td><?php echo $pdata1['description']?></td>
						<td>
							<img src="<?php echo'admin/imgs/'.$pdata1['photo'] ?>" width=100%>
						</td>
						<td><?php echo $pdata1['price']?></td>
					</tr>
					<?php
				     }}
					?>
				</tbody>
			</table>
		</div>
		<!-- History end -->
		
	</div>

</body>
</html>