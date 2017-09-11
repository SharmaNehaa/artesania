<?php
	session_start();
	include_once 'accesscontrol.php';
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$query = "Select * from interests where username='".$_SESSION['username']."'";
	$result=mysqli_query($con,$query);
	if((mysqli_num_rows($result))==1) {
	
		$query="update interests set artist='".$_POST['artist']."',movie='".$_POST['movie']."',band_music='".$_POST['band_music']."',book='".$_POST['book']."',writer='".$_POST['writer']."',cuisine='".$_POST['cuisine']."',fashion_brand='".$_POST['fashion_brand']."',fashion_designer='".$_POST['fashion_designer']."',painter='".$_POST['painter']."',category='".$_POST['category']."',subcategory='".$_POST['subcategory']."' where username='".$_SESSION['username']."'";

	}
	else {
		$query="insert into interests values('".$_SESSION['username']."','".$_POST['artist']."','".$_POST['movie']."','".$_POST['band_music']."','".$_POST['book']."','".$_POST['writer']."','".$_POST['cuisine']."','".$_POST['fashion_brand']."','".$_POST['fashion_designer']."','".$_POST['painter']."','".$_POST['category']."','".$_POST['subcategory']."')";

	}
	if(mysqli_query($con,$query)){
		header("Location:paint.php?flag2=1");
	}
	else
		die("Please try again. error:".$query);

	mysqli_close($con);
?>
