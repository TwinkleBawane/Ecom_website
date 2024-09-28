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
	<title>User List Page</title>
	<?php include('../bootcdn.php') ?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

		<div class="well hidden-print">
			<span class="glyphicon glyphicon-list"></span>
			<b>Users List PAGE</b>
		</div>

		<!-- User list start section  -->

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
						<th>Student Id</th>
						<th>Registration Date</th>
						<th>Student Name</th>
						<th>Contact Number</th>
						<th>Email Id</th>
						<th>Password	</th>
					</tr>

					<tbody id="myTable">
						<?php 
						$sdata = mysqli_query($con,"SELECT * FROM register ORDER BY id desc");
						while ($row = mysqli_fetch_assoc($sdata))
					{
						?>
						<tr>
							<td><?php echo $row['id'] ?></td>
							<td><?php echo $row['rdate'] ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['contact'] ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['pass'] ?></td>
						</tr>
						<?php 
					}
						?>
					</tbody>

				</thead>
			</table>
		</div>
		<!-- table end -->


		<!-- User list end section  -->

		
	</div>

</body>
</html>