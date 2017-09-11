<?php
session_start();
include_once 'db.php';
include_once 'common.php';
include_once 'dialog.php';
include 'accesscontrol.php';
dbConnect("artesania");	
/*Copying uploaded file to server's computer*/
$allowedExts = array("gif", "jpeg", "jpg", "png","pdf","mp4","flv","mp3");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts)) {
  	  $fname = "images/".$_FILES["file"]["name"];	  
}  
 else if($_FILES["file"]["type"] == "application/pdf" 
		|| $_FILES["file"]["type"] == "application/msword" 
		|| $_FILES["file"]["type"] == "application/application/x-pdf"
		|| $_FILES["file"]["type"] == "application/application/acrobat"
		|| $_FILES["file"]["type"] == "application/applications/vnd.pdf"
		|| $_FILES["file"]["type"] == "application/text/pdf"
		|| $_FILES["file"]["type"] == "application/text/x-pdf"
		|| $_FILES["file"]["type"] == "application/x-download"
		|| $_FILES["file"]["type"] == "text/plain"
		) {
 		$fname = "docs/".$_FILES["file"]["name"];
 }
 else if($_FILES["file"]["type"] == "audio/mpeg" ) {
 		$fname = "audio/".$_FILES["file"]["name"];
 }
else {
	echo "Type: " . $_FILES["file"]["type"] . "<br> Extension: " . $_FILES["file"]["name"] . "<br>";
	die("ddgh");
  echo $_FILES["file"]["type"];
  echo("nhiii");  
  }
  
 if ($_FILES["file"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
	  move_uploaded_file($_FILES["file"]["tmp_name"],$fname);	
	  
	  /*UPDATING DATABASE WITH THE NEWLY UPLOADED ART  PRODUCT*/
	  /*Update table Product*/
	  $visibility=0;
	  $query1="Select premium from user_details where username='".$_SESSION['username']."'";
	  $result1=mysqli_query($con,$query1);
	 if (!$result1) {
		die(mysqli_error($con));
	}
	echo $fname;
	  $row1 = mysqli_fetch_array($result1);	  
	  if($row1['premium']==1) 
		$visibility=1;	
	  	
	  $query="Insert into products(username,category,caption, description,path,visibility,on_sale) values ('".$_SESSION['username']."','".$_POST['category']."','".$_POST['caption']."','".$_POST['description']."','".$fname."','".$visibility."','".$on_sale."')";
	  $result=mysqli_query($con,$query);
	  if (!$result) {
		die(mysqli_error($con));
	  } 
	  
	  $query2="select max(product_id) from products";
	  $result2=mysqli_query($con,$query2);	  
	  if (!$result2) {
		die(mysqli_error($con));
	  } 
	  else{
		$row2 = mysqli_fetch_array($result2);	
		$p_id=$row2['product_id'];
	  }
	  
	  $query3="insert into '".$_POST['category']."' (product_id,subcategory) values (".$p_id.",'".$_POST['subcat']."') ";	  
	  if (!mysqli_query($con,$query3)) {
		die(mysqli_error($con));
	  } 
	  
	  if(isset($_POST['size'])){
		  $query3="update '".$_POST['category']."' set size='".$_POST['size']."' where product_id=".$p_id." ";	  
		  if (!mysqli_query($con,$query3)) {
			die(mysqli_error($con));
		  }
	  }
	   if(isset($_POST['price'])){
		  $query3="update '".$_POST['category']."' set price=".$_POST['price']." where product_id=".$p_id." ";	  
		  if (!mysqli_query($con,$query3)) {
			die(mysqli_error($con));
		  } 
	  }
	  
		dialogBox("Your art piece has been successfully uploaded! Continue to Explore more..");
		header("Location:profile.php");
		
	}
	
	
	


?> 
