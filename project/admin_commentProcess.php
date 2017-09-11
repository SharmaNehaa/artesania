<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$query="insert into replies (reply_content,topic_id,username) values ('".$_POST['desc']."',".$_GET['topic_id'].",'Admin')";	
	echo $query;
	if((mysqli_query($con,$query))){
		header('Location:view_comments.php?topic_id='.$_GET['topic_id'].'');
	}

?>