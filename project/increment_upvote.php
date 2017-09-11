<?php 
	session_start();
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$query="alter tale prodcts set upvotes=upvotes+1 where path='".$_GET['path']."'";
	$_SESSION['path']=$_GET['path'];
	if(mysqli_query($con,$query)){
		header("Location:product_profile.php?path=".$_SESSION['path']."");
	}
	else
		die("Your upvaote could be counted.Please try again!");
?>