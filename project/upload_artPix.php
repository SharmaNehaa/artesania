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
	if ($_POST['caption']=='' or $_POST['descrip']=='' or $_POST['category']=='' or $_POST['subcat']=='' or $_POST['on_sale']=='' or $_GET['tmp_name']=='') {
        error('One or more required fields were left blank.\\n'.
              'Please fill them in and try again.'.$_POST['caption']. $_POST['descrip'].$_POST['category'].$_POST['subcat'].$_GET['tmp_name']);
			  header( 'Location:submit_art.php');
    	}
		
	if($_POST['on_sale']=='yes') {
		if($_POST['price']=='' or $_POST['size']=='') {
			error('One or more required fields were left blank.\\n'.
		  'Please fill them in and try again.');
		  header( 'Location:submit_art.php');
		}
	}
	if ((($_GET['type'] == "image/gif")
|| ($_GET['type'] == "image/jpeg")
|| ($_GET['type'] == "image/jpg")
|| ($_GET['type'] == "image/pjpeg")
|| ($_GET['type'] == "image/x-png")
|| ($_GET['type'] == "image/png")
|| ($_GET['type'] == "image/GIF")
|| ($_GET['type'] == "image/JPEG")
|| ($_GET['type'] == "image/JPG")
|| ($_GET['type'] == "image/PJPEG")
|| ($_GET['type'] == "image/PNG")
|| ($_GET['type'] == "image/X-PNG"))) {
  	  $fname = "images/".$_GET['name'];
		move_uploaded_file($_GET['tmp_name'],$fname);	
}

else {
	echo $_GET['name'].$_GET['tmp_name'].$_GET['type'];
} 
?>