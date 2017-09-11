<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location:sign_in.php");
	}
	$query="insert into reported_images values ('".$_SESSION['username']."','".$_GET['product_id']."','".$_GET['path']."')";
	if(mysqli_query($con,$query)){
				echo "<script type='text/javascript'>alert('Image has been reported.Thank you for the review!');</script>";
		header("Location:product_profile.php?path=".$_GET['path']."");
	}
	else{
		die("You have already reported the image.Please wait for the admin to review it.");
	}
?>

	
