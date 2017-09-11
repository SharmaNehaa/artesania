<?php
	session_start();
	$_SESSION['username']=$_POST['username'];
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}

	$SESSION['username']=$_POST['username'];
	$email;
	if("'".$_POST['email_id']."'"=="'".$_POST['email_id1']."'")
		$email="'".$_POST['email_id']."'";
	else {
		/*IF EMAIL IDS DO NOT MATCH EXECUTE ALERT */
	}
	$year=$_POST['birthYear'];
	$month=$_POST['birthMonth'];
	$day=$_POST['birthDay'];

	$dob=$year."-".$month."-".$day;

	$query="insert into user_details (username,password,dob,gender,email) values ('".$_POST['username']."','".md5($_POST['pwd'])."','$dob','".$_POST['gender']."',$email)";

	if(mysqli_query($con,$query)){
		header("Location:registered.php");
	}
	else
		die("Registration failed.We are already have a user with this username.Please try again with some other username.");

	mysqli_close($con);
?>
