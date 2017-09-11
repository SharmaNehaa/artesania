<?php 
	session_start();
	if(isset($_SESSION['username'])){
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}

			$query="update topics set upvotes=upvotes+1 where topic_id='".$_GET['topic_id']."'";
			$_SESSION['path']=$_GET['path'];
			if(mysqli_query($con,$query)){
			
			}
			else{
				echo "Your upvote could not be counted.Please try again";
			}
	
		if($_GET['caller_page']=='home.php') {
			header("Location:home.php");
		}
		else if($_GET['caller_page']=='whats_hot.php') {
	
			header("Location:whats_hot.php");
		}
		else
		header("Location:forum_topic.php?topic_id=".$_GET['topic_id']."");
	
	}
	else{
		header("Location:sign_in.php");
	}
?>
