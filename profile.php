<?php 
session_start();
include('connect.php');

if (empty($_SESSION['id']))   
{
	header('location:index.php');
}

$sql = mysqli_query($con,"SELECT * FROM register WHERE id = '".$_SESSION['id']."' ");

$abc = mysqli_fetch_array($sql);

//update query start

if (isset($_POST['update']))
{
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	mysqli_query($con,"UPDATE register SET name='$name',contact='$contact',email='$email',pass='$pass' WHERE id = '".$_SESSION['id']."' ");

	echo "<script>
	alert('Profile update successfully');
	window.location.href='profile.php';
	</script>";
}

//update query end 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Profile Page</title>
	<?php include('bootcdn.php') ?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

		<div class="well">
			<span class="glyphicon glyphicon-user"></span>
			<b>PROFILE PAGE</b>
		</div>

		  <!-- profile update section starts -->
  <div class="row">
    <div class="col-sm-5">
      <div class="well">
        <h4>Update Profile</h3>

        <hr>
        <form method="post">
          <label>Profile Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo $abc['name']; ?>"><br>
          <label>Contact Number</label>
          <input type="number" name="contact" class="form-control" value="<?php echo $abc['contact']; ?>"><br>
          <label>Email ID</label>
          <input type="text" name="email" class="form-control" value="<?php echo $abc['email']; ?>"><br>
          <label>Password</label>
          <input type="text" name="pass" class="form-control"value="<?php echo $abc['pass']; ?>"><br>

          <button class="btn btn-primary" name="update" style="border-radius: 20px;" type="submit">Update Profile</button>
        </form>

      </div>

    </div>



  </div>


  <!-- profile update section starts -->
		
	</div>

</body>
</html>