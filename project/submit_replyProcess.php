<?php
	include "accesscontrol.php";
	
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$query="insert into replies (username,topic_id,reply_content) values ('".$_SESSION['username']."','".$_SESSION['topic_id']."','".$_POST['reply']."')";
	if($result=mysqli_query($con,$query)){
		header("Location:forum_topic.php?topic_id=".$_SESSION['topic_id']."");
	}
	else
		die("Error:".mysqli_error($con));
?>
