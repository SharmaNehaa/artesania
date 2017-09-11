<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	session_start();
	$query="delete from user_details where username='".$_GET['username']."'";
	if(mysqli_query($con,$query)){
		header("Location:all_users.php");
	}
	else{
		die("The user could not be deleted.Please try again.");
	}
?>