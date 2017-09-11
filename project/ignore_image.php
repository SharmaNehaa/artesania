<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	session_start();
	$query4="delete from reported_images where path='".$_GET['path']."'";
	if(mysqli_query($con,$query4)){
		header("Location:reported_images.php");
	}
	else{
		die("Please try again.");
	}
?>