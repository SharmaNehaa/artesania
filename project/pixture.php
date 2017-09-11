<!DOCTYPE html>
<html>
	<head>
	<script src="js/jquery-1.10.2.min.js"></script>
	<link rel= "stylesheet" href="css/primary.css">
	<link rel= "stylesheet" href="css/pixture.css">
	<script>
	function redirect_page(){
		if($("#pixlrFrame").get(0).contentWindow.location=="http://localhost/xampp/project/home.php") {
			window.location.href ="home.php";
		}
		else if($("#pixlrFrame").get(0).contentWindow.location=="http://localhost/xampp/project/accesscontrol.php") {
			window.location.href ="accesscontrol.php";
		}
		else if($("#pixlrFrame").get(0).contentWindow.location=="http://localhost/xampp/project/profile.php") {
			window.location.href ="profile.php";
		}
		else {
			alert('url = ' + document.frames['pixlrFrame'].location.href);
			alert("You are going to:"+$("#pixlrFrame").get(0).contentWindow.location);
		}
	}
	/*function redirect_page(){
		 //alert(read_url);
		 alert( $('pixlr').contents().get(0).location.href );
		 	//alert('url = ' + document.frames['pixlr'].location.href);
			//window.location.href ="home.php";
		
	}*/
	</script> 		
	</head>
	<body>
		<div id = "container"> 	<!--main container of our page. to wrap the content in a specific width. Will contain header, main, left side, footer-->
			<div id="header">
				<div id="logo">
						<img src="images/LOGO.png" alt="Artesania" ></img>
						<div class="para">An online community for art enthusiasts!</div>						
				</div>				
				<div id="social">
					Connect:
					<a href="https://facebook.com" class="facebook"><img src="images/fb_logo.jpg" alt="Facebook" ></img></a>
					<a href="https://twitter.com" class="twitter"><img src="images/twitter_logo.jpg" alt="Twitter"></img></a>
					<div class="primary">
						<button value= "SignIn" type="button" name="Signin" onclick="location.href='sign_in.php';">Sign In</button>
						<button value="Upload" type="button" name="Upload" onclick="location.href='uploadPixture.php';">Upload</button>
					</div>
					
				</div>
			</div><!--div header close-->
			<div class="clear"></div>
			<div id ="main">
				<div id = "content">
					<?php
						if(isset($_GET['product_id'])) {
							$image="image=http://localhost/xampp/project/".$_GET['path']."&";
							$title="title=http://localhost/xampp/project/".$_GET['caption']."&";
						}
						else {
							$image="";
							$title="";
						}
					?>
					<iframe id="pixlrFrame" name="pixlr" type="text/html" width="100%" height="100%" src="<?php echo'http://pixlr.com/editor?name=artesania&referrer=Artesania&exit=http%3A%2F%2Flocalhost%2Fxampp%2Fproject%2Fhome.php&'.$image.$title.'method=GET&target=http%3A%2F%2Flocalhost%2Fxampp%2Fproject%2FuploadPixture.php&redirect=true'?>" frameborder="0"  onLoad="redirect_page();">
					</iframe> 	
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p>
			</div>
		</div><!--div container close-->
	</body>
</html>
				
	
