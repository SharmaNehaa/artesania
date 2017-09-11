<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$query="delete from topics where topic_id='".$_GET['topic_id']."'";
	$query1="delete from replies where topic_id='".$_GET['topic_id']."'";	
	if((mysqli_query($con,$query)) && (mysqli_query($con,$query1))){
		header('Location:admin_queries.php');
	}
	else
		die("This question could not be deleted.Please try again.");
?>