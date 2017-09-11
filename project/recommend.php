<?php
	include "common.php";
	include "accesscontrol.php";
	$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("connection error");
		}	
		$query="insert into recommendations (username,artist) values ('".$_SESSION['username']."','".$_GET['artist']."')";
		if(mysqli_query($con,$query)){
			header('Location:artist_profile.php?username='.$_GET['artist'].'');
		}
		else {
			error("You have already recommended this artist");
			header('Location:artist_profile.php?username='.$_GET['artist'].'');
		}
?>
