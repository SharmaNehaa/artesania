<?php
session_start();
echo "<script src='js/jquery-1.10.2.min.js'></script>";
include_once 'db.php';
include_once 'common.php';
include_once 'dialog.php';


if(isset($_SESSION['username'])) {
	$_SESSION['image']=$_GET['image'];
	echo "http://localhost/xampp/project/submit_art.php?path=".$_GET['image']."&username=".$_SESSION['username'];
	header("Location:http://localhost/xampp/project/submit_art.php?title=".$_GET['title']."&path=".$_GET['image']."&username=".$_SESSION['username']."");

	//top.location.href="http://localhost/xampp/project/submit_art.php?path=".$_GET['image']."&username=".$_SESSION['username']."";
	//header('Location:submit_art.php?path='.$_GET['image'].'&username='.$_SESSION['username'].'');
	

}
else if(!isset($_SESSION['username'])){
	//echo '<script>alert($_GET["image"]."   title:   ".$_GET["title"]);</script>';
	header("Location:accesscontrol.php");
}
?>
