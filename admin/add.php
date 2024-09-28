<?php 
session_start();
include('../connect.php');

if (empty($_SESSION['aname']))   
{
	header('location:index.php');
}

if (isset($_POST['add'])) 
{
	$udate = date('Y-m-d');
	$title = $_POST['title'];
	$description = $_POST['description'];
	$photo = $_FILES['photo']['name'];
	$price = $_POST['price'];

	mysqli_query($con,"INSERT INTO products(udate,title,description,photo,price) VALUES('$udate','$title','$description','$photo','$price')");
	$dir = "imgs/";
	$photo = $_FILES['photo']['name'];
	$tmp_photo = $_FILES['photo']['tmp_name'];
	move_uploaded_file($tmp_photo,$dir.$photo);

	echo "<script>
	alert('Prodcut added successfully');
	window.location.href='add.php';
	</script>";


}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Product Page</title>
	<?php include('../bootcdn.php') ?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

		<div class="well">
			<span class="glyphicon glyphicon-home"></span>
			<b>ADD PRODUCT PAGE</b>
		</div>

		<!-- add product section start -->
		<div class="row">
			<div class="col-sm-5">
				<!-- add form start  -->
				<form method="post" enctype="multipart/form-data">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3>Add New Product</h3>
						</div>
						<div class="panel-body">
							<label>Product Title</label>
							<input type="text" name="title" placeholder="Title" class="form-control">
							<br>
							<label>Product Description</label>
							<textarea name="description" class="form-control"></textarea>
							<br>
							<label>Upload Product Image</label>
							<input type="file" name="photo" class="form-control">
							<br>
							<label>Enter Price</label>
							<input type="number" name="price" placeholder="Enter Price" class="form-control">
						</div>
						<div class="panel-footer">
							<button type="submit" name="add" class="btn btn-success">Add Product</button>
						</div>
					</div>
				</form>
				<!-- add form end  -->
			</div>
		</div>
		<!-- add product section end -->

		
	</div>

</body>
</html>