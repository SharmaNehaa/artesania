<?php
session_start();
include_once 'common1.php';
$con=mysqli_connect("localhost","root","","artesania");
if(!$con){
	die("Connection error".mysqli_connect_error());
}

echo $_SESSION['category'];
		echo $_SESSION['caption'];
		echo $_SESSION['descrip'];
		echo $_SESSION['subcat'];
		echo $_SESSION['on_sale'];
		echo $_SESSION['price'];
		echo $_SESSION['size'];
		echo $_SESSION['file_name'];
		echo $_SESSION['file_type'];
		echo $_SESSION['file_error'];
		echo $_SESSION['file_tmp_name'];
		echo $_SESSION['file_size'];
    	


?>

