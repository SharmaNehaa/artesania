<?php
	session_start();
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	if($_GET['status']=='Undelivered'){
		$query="update transaction set status='Delivered' where trans_id=".$_GET['trans_id']."";
	}
	else
		$query="update transaction set status='Undelivered' where trans_id=".$_GET['trans_id']."";
		
	if(mysqli_query($con,$query)){
		header('Location:transactions.php');
	}
	else{
		echo "The status could not be changed.Please try again.";
	}
?>