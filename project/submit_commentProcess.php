<?php
	session_start();
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	if(!isset($_SESSION['username'])) {
		header("Location:sign_in.php");
	}
	else {
		$query="insert into comments (username,product_id,comment) values ('".$_SESSION['username']."','".$_SESSION['prod_id']."','".$_POST['desc']."')";
		if(mysqli_query($con,$query)){
			header("Location:product_profile.php?path=".$_SESSION['path']."");
		}
		else
			die("Some Problem occured in retrieving images from the database");
	}
?>
