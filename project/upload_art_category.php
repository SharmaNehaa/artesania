<?php
session_start();
include_once 'db.php';
include_once 'common.php';
include_once 'dialog.php';
include 'accesscontrol.php';
$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}
/*Copying uploaded file to server's computer*/
$allowedExts = array("gif", "jpeg", "jpg", "png","pdf","mp4","flv","mp3","GIF", "JPEG", "JPG", "PNG","PDF","MP4","FLV","MP3");
$temp = explode(".", $_SESSION['file_name']);
$extension = end($temp);
if ((($_SESSION['file_type'] == "image/gif")
|| ($_SESSION['file_type'] == "image/jpeg")
|| ($_SESSION['file_type'] == "image/jpg")
|| ($_SESSION['file_type'] == "image/pjpeg")
|| ($_SESSION['file_type'] == "image/x-png")
|| ($_SESSION['file_type'] == "image/png")
|| ($_SESSION['file_type'] == "image/GIF")
|| ($_SESSION['file_type'] == "image/JPEG")
|| ($_SESSION['file_type'] == "image/JPG")
|| ($_SESSION['file_type'] == "image/PJPEG")
|| ($_SESSION['file_type'] == "image/PNG")
|| ($_SESSION['file_type'] == "image/X-PNG"))
&& ($_SESSION['file_size'] < 2000000)
&& in_array($extension, $allowedExts)) {
  	  $fname = "images/".$_SESSION['file_name'];	  
}  
 else if($_SESSION['file_type'] == "application/pdf" 
		|| $_SESSION['file_type'] == "application/msword" 
		|| $_SESSION['file_type'] == "application/application/x-pdf"
		|| $_SESSION['file_type'] == "application/application/acrobat"
		|| $_SESSION['file_type'] == "application/applications/vnd.pdf"
		|| $_SESSION['file_type'] == "application/text/pdf"
		|| $_SESSION['file_type'] == "application/text/x-pdf"
		|| $_SESSION['file_type'] == "application/x-download"
		|| $_SESSION['file_type'] == "text/plain"
		) {
 		$fname = "docs/".$_SESSION['file_name'];
 }
 else if($_SESSION['file_type'] == "audio/mpeg" ) {
 		$fname = "audio/".$_SESSION['file_name'];
 }
else {
	echo "Type: " . $_SESSION['file_type'] . "<br> Extension: " . $extension . "size: ".$_SESSION['file_size'] ."<br>";
	die("ddgh");
  echo $_SESSION['file_type'];
  echo("nhiii");  
  }
  
 if ($_SESSION['file_error'] > 0)
	{
	echo "Return Code: " . $_SESSION['file_error'] . "<br>";
	}
	else
	{
	  if(move_uploaded_file($_SESSION['file_tmp_name'],$fname)){
		echo "uploaded";
	  }	
	  else{
		echo $fname;
		die("kdfguysgf");
	  }	
	  echo $fname;
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
	  	
	  $query="Insert into products(username,category,caption, description,path,visibility,on_sale) values ('".$_SESSION['username']."','".$_SESSION['category']."','".$_SESSION['caption']."','".$_SESSION['descrip']."','".$fname."','".$visibility."','".$_SESSION['on_sale']."')";
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
		$p_id=$row2['max(product_id)'];
	  }
	  
	  $query3="insert into ".$_SESSION['category']." (product_id,subcategory) values (".$p_id.",'".$_SESSION['subcat']."') ";	  
	  if (!mysqli_query($con,$query3)) {
		die(mysqli_error($con));
	  } 
	  
	  if(isset($_SESSION['size'])){
		  $query3="update ".$_SESSION['category']." set size='".$_SESSION['size']."' where product_id=".$p_id."";	  
		  if (!mysqli_query($con,$query3)) {
			die(mysqli_error($con));
		  }
	  }
	   if(isset($_SESSION['price'])){
		  $query3="update ".$_SESSION['category']." set price=".$_SESSION['price']." where product_id=".$p_id." ";	  
		  if (!mysqli_query($con,$query3)) {
			die(mysqli_error($con));
		  } 
	  }
		header("Location:profile.php");
		dialogBox("Your art piece has been successfully uploaded! Continue to Explore more..");
		
		
	}
	
	
	


?> 
