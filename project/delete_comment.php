<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$query="delete from replies where reply_id='".$_GET['reply_id']."'";
	if(mysqli_query($con,$query)){
		header('Location:view_comments.php?topic_id='.$_GET['topic_id'].'');
	}
	else
		die("This comment could not be deleted.Please try again.");
?>