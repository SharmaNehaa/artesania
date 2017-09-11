<?php
	session_start();
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$query="insert into topics (username,topic_subject,topic_cat) values ('".$_SESSION['username']."','".$_POST['question']."','".$_SESSION['category_id']."')";
	if($result=mysqli_query($con,$query)){
		header("Location:forum.php?category_id=".$_SESSION['category_id']."&category=".$_SESSION['category']."");
	}
	else
		die("Error:".mysqli_error($con));
					?>
