<?php 
	session_start();
	if(isset($_SESSION['username'])){
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}
			$query="update products set upvotes=upvotes-1 where path='".$_GET['path']."'";
			$_SESSION['path']=$_GET['path'];
			if(mysqli_query($con,$query)){
				$query1="delete from upvotes where username='".$_SESSION['username']."' and path='".$_GET['path']."'";
				if(mysqli_query($con,$query1)){
						header("Location:product_profile.php?path=".$_SESSION['path']."");
				}
			}
			else
				die("Your downvote could not be counted.Please try again!");
	
		if($_GET['caller_page']=='home.php') {
			header("Location:home.php");
		}
		else if($_GET['caller_page']=='whats_hot.php') {
	
			header("Location:whats_hot.php");
		}
		else
		header("Location:product_profile.php?path=".$_SESSION['path']."");
	
	}
	else{
		header("Location:sign_in.php");
	}
?>
