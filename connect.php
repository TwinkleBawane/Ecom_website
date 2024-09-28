<?php 
$servername = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect("$servername","$username","$password");

if ($con)
{
	mysqli_select_db($con,"ecommerce");
	// echo"yes connect..";
}
?>