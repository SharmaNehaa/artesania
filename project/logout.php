<?php
	session_start();
	unset($_SESSION['username']);
	session_destroy();
if(isset($_SESSION['username'])) {
	echo "you re still logged in";
}
else {
	header("Location:home.php");
}
?>
