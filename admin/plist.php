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
	<title>Products List Page</title>
	<?php include('../bootcdn.php') ?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

		<div class="well hidden-print">
			<span class="glyphicon glyphicon-th"></span>
			<b>Users List PAGE</b>
		</div>

		<!-- Product list start section  -->

		<div class="row hidden-print">
			<div class="col-sm-3">
				<input type="text" id="myInput" class="form-control" placeholder="filter or search here...">


              <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


			</div>
			<div class="col-sm-1">
				<a onclick="print()" class="btn btn-primary" href="#">
					<span class="glyphicon glyphicon-print"> Print </span>
				</a>
			</div>
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
					</tr>

					<tbody id="myTable">
						<?php 
						$sdata = mysqli_query($con,"SELECT * FROM products ORDER BY pid desc");
						while ($row = mysqli_fetch_assoc($sdata))
					{
						?>
						<tr>
							<td><?php echo $row['pid'] ?></td>
							<td><?php echo $row['udate'] ?></td>
							<td><?php echo $row['title'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<td>

								<img src="<?php echo 'imgs/'.$row['photo'] ?>" width="80px">
									
								</td>
							<td><?php echo $row['price'] ?></td>
						</tr>
						<?php 
					}
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