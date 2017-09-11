<?php
	session_start();
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$query1="select * from bank where username='".$_SESSION['username']."'";
	$result=mysqli_query($con,$query1);
	$row = mysqli_fetch_array($result);
		if(($row['bank_name']==$_POST['bank_name']) && ($row['bank_acc_no']==$_POST['bank_acc_no'])){
			$query="update user_details set name='".$_POST['name']."',contact='".$_POST['contact']."',address='".$_POST		['address']."',bank_acc_no='".$_POST['bank_acc_no']."',bank_name='".$_POST['bank_name']."' where username='".$_SESSION['username']."'";

		if(mysqli_query($con,$query)){
			header("Location:paint.php?flag1=1");
		}
		else
			die("Some error occured.Please try again...");
	}else
			die("Please enter a valid bank name and account number");
	mysqli_close($con);
?>
