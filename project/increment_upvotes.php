<?php 
	session_start();
	if(isset($_SESSION['username'])){
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}
		$query2= "select * from upvotes where path='".$_GET['path']."' and username='".$_SESSION['username']."'";
		$result2=mysqli_query($con,$query2);
		if((mysqli_num_rows($result2))<1) {
			$query="update products set upvotes=upvotes+1 where path='".$_GET['path']."'";
			$_SESSION['path']=$_GET['path'];
			if(mysqli_query($con,$query)){
				$query1="insert into upvotes(path, username) values('".$_GET['path']."','".$_SESSION['username']."')";
				mysqli_query($con,$query1);
			}
			else
				die("Your upvote could not be counted.Please try again!");
		}
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
