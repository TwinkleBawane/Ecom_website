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
    alert('Successfully Purchased new Product...');
    window.location.href='home.php';
    </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Home Page</title>
	<?php include('bootcdn.php') ?>
</head>
<body>

	<?php include('header.php') ?>

	<div class="container">

		<div class="well">
			<span class="glyphicon glyphicon-home"></span>
			<b>HOME PAGE</b>
		</div>

		  <!-- Products starts -->

  <div class="row">

    <?php   
    $sdata = mysqli_query($con,"SELECT * FROM products ORDER BY pid desc ");
              while ($row = mysqli_fetch_assoc($sdata)) {
    ?>
    <div class="col-sm-4">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <?php echo $row['title'] ?>
        </div>
        <div class="panel-body">
          <img src="<?php echo 'admin/imgs/'.$row['photo'] ?>" width="100%" height="200px">

          <b><p style="letter-spacing: 2px;"><?php echo $row['description'] ?></p></b>
          <b><h3 style="letter-spacing:1px;"><?php echo "PRICE: ".$row['price'] ?></h3></b>
        </div>
        <div class="panel-footer">
          <form method="post">
                <!-- hidden inputs starts -->
                <input type="hidden" name="pdate" value="<?php echo date('Y-m-d') ?>">
                
                <input type="hidden" name="uid" value="<?php echo $_SESSION['id'] ?>">
                
                <input type="hidden" name="uname" value="<?php echo $_SESSION['name'] ?>">
                
                <input type="hidden" name="proid" value="<?php echo $row['pid'] ?>">
                <!-- hidden inputs ends -->
                
                <button type="submit" class="btn btn-primary" name="btn1" style="border-radius: 20px;">Purchase</button>
                
              </form>
        </div>
      </div>
    </div>




    <?php } ?>
  </div>

  <!-- Products ends -->
		
	</div>

</body>
</html>