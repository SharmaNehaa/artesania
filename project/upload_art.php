<?php
include_once 'db.php';
include_once 'common.php';
include_once 'dialog.php';
include 'accesscontrol.php';
$con=mysqli_connect("localhost","root","","artesania");
if(!$con){
	die("Connection error".mysqli_connect_error());
}

/**If file is being uploaded through Pixture**/
if(isset($_GET['path']) && isset($_GET['username'])) {
	
	$contents=file_get_contents($_GET['path']);

	$doc_root= $_SERVER['DOCUMENT_ROOT'];
	//echo $doc_root;
	$image_upload_path = $doc_root . '/xampp/project/images/';
	//echo $image_upload_path;
	$image_name2 = $_GET['title'] . '.jpg';
	$fname = "images/".$_GET['title'].'.jpg';

	$destination  = $image_upload_path . $image_name2;

	$file = fopen($destination, "wb+");
	fputs($file, $contents);
	fclose($file);

	header('Content-Disposition: attachment; filename='.basename($destination));

	readfile($destination);


	/*echo "path:".$_GET['path'];
	$temp = explode(".", $_GET['path']);
	$extension = end($temp);
	$fname="images/".$_GET['title'];
	$filenameIn  = $_GET['path'];
	$filenameOut = "" . $fname;
	$contentOrFalseOnFailure   = file_get_contents($filenameIn);
	$byteCountOrFalseOnFailure = file_put_contents($filenameOut, $contentOrFalseOnFailure);
	
	//echo $contentOrFalseOnFailure." 			byte:		".$byteCountOrFalseOnFailure;
	//move_uploaded_file($_GET['path'],$fname);
	
	
	
	 /*UPDATING DATABASE WITH THE NEWLY UPLOADED ART  PRODUCT*/
	  /*Update table Product*/
	  $visibility=0;
	  $query1="Select premium from user_details where username='".$_SESSION['username']."'";
	  $result1=mysqli_query($con,$query1);
	 if (!$result1) {
		die(mysqli_error($con));
	}
	//echo $fname;
	  $row1 = mysqli_fetch_array($result1);	  
	  if($row1['premium']==1) 
		$visibility=1;	
	  	
	  $query="Insert into products(username,category,caption, description,path,visibility,on_sale) values ('".$_SESSION['username']."','".$_POST['category']."','".$_POST['caption']."','".$_POST['descrip']."','".$fname."','".$visibility."','".$_POST['on_sale']."')";
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
	  
	  $query3="insert into ".$_POST['category']." (product_id,subcategory) values (".$p_id.",'".$_POST['subcat']."') ";	  
	  if (!mysqli_query($con,$query3)) {
		die(mysqli_error($con));
	  } 
	  
	  if($_POST['size']!=''){
		  $query3="update ".$_POST['category']." set size='".$_POST['size']."' where product_id=".$p_id."";	  
		  echo "<br>".$query3;
		  if (!mysqli_query($con,$query3)) {
			die(mysqli_error($con));
		  }
		  echo "size:".$_POST['size'];
	  }
	   if($_POST['price']=''){
		  $query3="update ".$_POST['category']." set price=".$_POST['price']." where product_id=".$p_id." ";	  
		  echo "<br>".$query3;
		  if (!mysqli_query($con,$query3)) {
			die(mysqli_error($con));
		  } 
	  }
	  
		die( '<meta http-equiv="refresh" content="1;url=http://localhost/xampp/project/profile.php" />');	  
		//header("Location:profile.php");
	
}


/*If you reach here that means file is being uploaded manually and not through Pixture*/
else {
	if ( $_POST['descrip']=='' or $_POST['category']=='' or $_POST['subcat']=='' or $_POST['on_sale']=='' or $_FILES["file"]["name"]=='') {
	   error('One or more required fields were left blank.\\n'.
		    'Please fill them in and try again.');
			  header( 'Location:submit_art.php');
	}
	if($_POST['on_sale']=='yes') {
		if($_POST['price']=='' or $_POST['size']=='') {
			error('One or more required fields were left blank.\\n'.
		    'Please fill them in and try again.');
			  header( 'Location:submit_art.php');
		}
	}


	/*Copying uploaded file to server's computer*/
	$allowedExts = array("gif", "jpeg", "jpg", "png","pdf","mp4","flv","mp3","GIF", "JPEG", "JPG", "PNG","PDF","MP4","FLV","MP3");
	echo $_POST['category'];
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/GIF")
	|| ($_FILES["file"]["type"] == "image/JPEG")
	|| ($_FILES["file"]["type"] == "image/JPG")
	|| ($_FILES["file"]["type"] == "image/PJPEG")
	|| ($_FILES["file"]["type"] == "image/PNG")
	|| ($_FILES["file"]["type"] == "image/X-PNG"))
	&& ($_FILES["file"]["size"] < 200000000)
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
	else if($_FILES["file"]["type"] == "audio/mpeg" 
		|| $_FILES["file"]["type"] == "audio/mp4"
		|| $_FILES["file"]["type"] == "audio/vnd.wave") {
		$fname = "audio/".$_FILES["file"]["name"];
	}
	else if($_FILES["file"]["type"] == "video/mp4" 
		|| $_FILES["file"]["type"] == "video/x-matroska"
		|| $_FILES["file"]["type"] == "video/mpeg"
		|| $_FILES["file"]["type"] == "video/quicktime"
		|| $_FILES["file"]["type"] == "video/ogg"
		|| $_FILES["file"]["type"] == "video/webm"
		|| $_FILES["file"]["type"] == "video/x-ms-wmv"
		|| $_FILES["file"]["type"] == "video/x-flv") {
		$fname = "video/".$_FILES["file"]["name"];
	}
	else {
	echo ini_get('max_file_uploads');
	//echo "Type: " . $_FILES["file"]["type"] . "<br> Extension: " . $_FILES["file"]["name"] . "<br>";
	die('Sorry this file type is not supported.');
	echo $_FILES["file"]["type"];
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
	  	
	  $query="Insert into products(username,category,caption, description,path,visibility,on_sale) values ('".$_SESSION['username']."','".$_POST['category']."','".$_POST['caption']."','".$_POST['descrip']."','".$fname."','".$visibility."','".$_POST['on_sale']."')";
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
	  
	  $query3="insert into ".$_POST['category']." (product_id,subcategory) values (".$p_id.",'".$_POST['subcat']."') ";	  
	  if (!mysqli_query($con,$query3)) {
		die(mysqli_error($con));
	  } 
	  
	  if($_POST['size']!=''){
		  $query3="update ".$_POST['category']." set size='".$_POST['size']."' where product_id=".$p_id."";	  
		  echo "<br>".$query3;
		  if (!mysqli_query($con,$query3)) {
			die(mysqli_error($con));
		  }
		  echo "size:".$_POST['size'];
	  }
	   if($_POST['price']=''){
		  $query3="update ".$_POST['category']." set price=".$_POST['price']." where product_id=".$p_id." ";	  
		  echo "<br>".$query3;
		  if (!mysqli_query($con,$query3)) {
			die(mysqli_error($con));
		  } 
	  }
	  echo "in 2";
		header("Location:profile.php");
		dialogBox("Your art piece has been successfully uploaded! Continue to Explore more..");

	}
}


?> 
