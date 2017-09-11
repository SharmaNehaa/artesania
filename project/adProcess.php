<?php

session_start();
include_once 'accesscontrol.php';

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    if (file_exists("images/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else 
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);
      }
    }
  }
else
  {
  echo "Invalid file";
  }

	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
	$strt_date=$_POST['birthYear']."-".$_POST['birthMonth']."-".$_POST['birthDay'];
	$path="images/".$_FILES["file"]["name"];
	$query="update user_details set dp_name='".$_FILES["file"]["name"]."' where username='".$_SESSION['username']."'";
	$query="insert into advertisement (username,max_clicks,camp_start_date,path,redirect_url) values('".$_SESSION['username']."','".$_POST['max_clicks']."','".$strt_date."','".$path."','".$_POST['web_url']."')";
	if($_POST['max_clicks']==50){
		$deduct=25;
	} else if($_POST['max_clicks']==150){
		$deduct=50;
	}
	else $deduct=100;
	$_SESSION['price']=$deduct;
	if(mysqli_query($con,$query)){
		header("Location:adPayment.php");
	}
	else
		die("Database not updated! Please try again.");

	mysqli_close($con);
?> 
