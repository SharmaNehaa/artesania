<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	session_start();
	$query="delete from products where path='".$_GET['path']."'";
	$query1="delete from comments where product_id in(select product_id from products where path='".$_GET['path']."')";
	$query2="select * from products where path='".$_GET['path']."'";
	echo $query2;
	$result=mysqli_query($con,$query2);
	$row = mysqli_fetch_array($result);
	$cat=$row['category'];
	echo $row['category'];
	$query3="delete from ".$cat." where product_id in(select product_id from products where path='".$_GET['path']."')";
	echo $query3;
	if(mysqli_query($con,$query3) && mysqli_query($con,$query1) && mysqli_query($con,$query)){
		header("Location:all_uploads.php");
	}
	else{
		die("The entry could not be deleted.Please try again.");
	}
?>