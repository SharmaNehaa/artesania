<?php 
	session_start();
	if(isset($_SESSION['username'])){
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}
		$query2= "select * from favourite where product_id='".$_GET['product_id']."' and username='".$_SESSION['username']."'";
		$result2=mysqli_query($con,$query2);
		if((mysqli_num_rows($result2))<1) {
			$query="insert into favourite values ('".$_SESSION['username']."','".$_GET['product_id']."')";
			$_SESSION['path']=$_GET['path'];
			if(mysqli_query($con,$query)){
				header("Location:product_profile.php?path=".$_SESSION['path']."");
			}
			else
				die("Your upvote could not be counted.Please try again!");
		}
		header("Location:product_profile.php?path=".$_SESSION['path']."");
	}
	else{
		header("Location:sign_in.php");
	}
?>
