<?php

			session_start();
			include_once 'accesscontrol.php';

			$con=mysqli_connect("localhost","root","","artesania");
			if(!$con){
				mysqli_connect_error("Connection error.".mysqli_connect_error());
			}
	
			$query="update user_details set dp_name='images/".$_POST['avatar']."' where username='".$_SESSION['username']."'";
			if(mysqli_query($con,$query)){
				header("Location:paint.php?flag3=1");
			}
			else{
				die("Avatar failed to set!".$query);
			}
			mysqli_close($con);	
?>
