<?php
	session_start();
	include_once 'common.php';
	include_once 'db.php';
	//Signin submitted form check

	//$username = $_SESSION['username'];
	//$password = $_SESSION['pass'];
	if(!isset($_SESSION['username'])) {
		//echo $_SESSION['username'];
	?>
	
<!DOCTYPE html>

  <head>
    <meta charset="utf-8">
    <title>Artesania</title>

		<link rel= "stylesheet" href="css/primary.css">
		<link rel= "stylesheet" href="css/contentAlign.css">

	<h1>
		<title> Please Log In for Access </title>
		<meta http-equiv="Content-Type"
		content="text/html; charset=iso-8859-1" />
	</h1>
	<style>
		
		#access_box {
				float:left;
				margin-left:10px;
				margin-top:10px;
				margin-top:20px;
				height:600px;
				width:1180px;
				padding:10px;
				font-size:15px;
				text-align:justify;
				color:rgb(253, 114, 114);
				background:rgba(229, 243, 239, 0.86);	
			}
			#access_box  p{
				text-align:center;
				padding-left:10px;
				font-size:15px;
				color:#9B1919;
				font-family:cursive;
			}
			#access_box  h1{
				text-align:center;
			}
			
			#access_box img{
				width:250px;
				height:250px;
				padding-left:450px;
			}
	</style>
	</head>
	
	<body>
		
		<div id="access_box">
		<h1> Login Required </h1>
		<p>You must log in to access this area of the site. To log in, <a href="sign_in.php">click here</a> to return to the login page.</p>
		<p>If you are not a registered user, <a href="sign_up.php">click here</a>
		to sign up for instant access!</p>
		<img src='images/fella_login.png'></img>

		</div>
		
	</body>
	</html>
<?php
	exit;
	}

	?>
