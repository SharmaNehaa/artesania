<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	session_start();
	$username=$_POST['username'];
	$pass=$_POST['pwd'];
	$query="select * from admin_login where username='$username' and password=md5('$pass')";
	$result=mysqli_query($con,$query);
	if((mysqli_num_rows($result))==1){
		$_SESSION['username']=$username;
		$_SESSION['pass']=$pass;
		header("Location:admin_profile.php");
	}
	else{
		die("Invalid username/password.Try again! To login <a href=\"admin_login.php\">click here</a>");
	}
?>

