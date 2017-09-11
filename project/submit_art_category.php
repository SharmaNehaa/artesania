<?php 

include_once("common.php");
include_once("db.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
		<meta content="utf-8" http-equiv="encoding" />
		<link rel= "stylesheet" href="css/primary.css">
		<link rel= "stylesheet" href="css/submit_art.css">
		<script src="js/jquery-1.10.2.min.js"></script>
		<script rel ="text/javascript" src="js/changeDropMenu.js" ></script>
		<script rel ="text/javascript" src="js/uploadChangeFormElements.js" ></script>
	</head>
	<body>
		<div id = "container"> 	<!--main container of our page. to wrap the content in a specific width. Will contain header, main, left side, footer-->
			<div id="header">
				<div id="logo">
						<img src="images/LOGO.jpg" alt="Artesania" ></img>
						<div class="para">An online community for art enthusiasts!</div>						
				</div>				
				<div id="social">
					Connect:
					<a href="https://facebook.com" class="facebook"><img src="images/fb_logo.jpg" alt="Facebook" ></img></a>
					<a href="https://twitter.com" class="twitter"><img src="images/twitter_logo.jpg" alt="Twitter"></img></a>
					<div class="primary">
						<button value= "SignIn" type="button" name="Signin" onclick="location.href='sign_in.php';">Sign In</button>
						<button value="Register" type="button" name="Join" onclick="location.href='sign_up.php';">Join</button>
					</div>
					
				</div>
			</div><!--div header close-->
			<div class="clear"></div>
			<div id = "menu">

				<ul >
					<li>
						<a href="home.php">Home</a>
					</li>
					 <li>
						<a href="#">Artists</a>
					</li>
					<li>
						<a href="#">What's Hot!</a>
					</li>
					<li>
						<a href="#">About Us</a>
					</li>
					<li>
						<a href="#">Take a Tour</a>
					</li>
					<li>
						<form action="#" id="left_pad">
							<input class="input" placeholder="Search" type="text" name="search"></input>
							<button type="submit" class="button">Go</button>
						</form>				
					</li>					
				</ul>
				<div class="clear"></div>
			</div>
			<?php
			//if (!isset($_POST['submitok'])) {
			// Display the upload art form
			//<?php echo $_SERVER['PHP_SELF'] ?>
			?>
		
			<div id ="main">
				
				<div id = "content">
					<form id="uploadInfo" name="uploadInfo" action="upoad_art_oldd.php" method="post" enctype="multipart/form-data">
						<div id="upload_area">
							<p class="para">CREATE YOUR ART</p>
							<div id="area">							
								<input type="file" name="file" id="file"></input><br>
							</div>
						</div>
						<input type="text" id="caption" placeholder="Caption" name="caption" ></input>
						<textarea type="text"  cols="40" rows="5" id="descrip" placeholder="Description" name="descrip"></textarea>
						<p class="para">CHOOSE CATEGORY & SUB-CATEGORY</p>
						<div class="clear"></div>
						<select id="category" name="category" label="Category">
							<option value="default" selected="selected">Select Category</option>
							<option value="photography">Photography</option>
							<option value="painting">Painting</option>
							<option value="recipes">Recipes</option>
							<option value="film_animation">Film and Animation</option>
							<option value="literature">Literature</option>
							<option value="fashion">Fashion</option>
							<option value="craft">Artisan Craft</option>
						</select>	
						<select id="subcat" name="subcat" label="Sub-Category">
							<option value="defaultsub" selected="selected">Select SubCategory</option>
						</select>
						<br>
						<div class="clear"></div>
						<p class="para" >On Sale</p>
						<div class="clear"></div>
						<div>
							<input class="radio" type="radio" id="yes_option" name="on_sale" value="yes">Yes</input>
							<input class="radio" type="radio" id="no_option" name="on_sale" value="no">No</input>
						</div>
						<div class="clear"></div><br>						
							<div style="display:none;" id="sale">
								<input type="text" name="price" placeholder="Price"></input><br>
								<input type="text" name="size" placeholder="Size"></input>
							</div>						
							<input type="submit" name="submitok" value="Upload">
						</form>											
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p>
			</div>
		</div><!--div container close-->
		
		<?php
	//}
/*
else {
	 dbConnect('artesania');
	 
	     if ($_POST['caption']=='' or $_POST['descrip']=='' or $_POST['category']=='' or $_POST['category']=='default' or $_POST['subcat']=='' or $_POST['subcat']=='defaultsub' or $_POST['on_sale']=='' or $_FILES["file"]["name"]=='') {
        error('One or more required fields were left blank.\\n'.
              'Please fill them in and try again.');
    	}
    	if($_POST['on_sale']=='yes') {
    		if($_POST['price']=='') {
    			error('One or more required fields were left blank.\\n'.
              'Please fill them in and try again.');
    		}
    	}
		session_start();
		$_SESSION['category']=$_POST['category'];
		$_SESSION['caption']=$_POST['caption'];
		$_SESSION['descrip']=$_POST['descrip'];
		$_SESSION['subcat']=$_POST['subcat'];
		$_SESSION['on_sale']=$_POST['on_sale'];
		$_SESSION['price']=$_POST['price'];
		$_SESSION['size']= $_POST['size'];
		$_SESSION['file_name']= $_FILES["file"]["name"];
		$_SESSION['file_type']=  $_FILES["file"]["type"];
		$_SESSION['file_error']= $_FILES["file"]["error"];
		$_SESSION['file_tmp_name']= $_FILES["file"]["tmp_name"];
		$_SESSION['file_size']=$_FILES["file"]["size"];
    	echo $_SESSION['file_tmp_name'];*/
 		header( 'Location:upoad_art_oldd.php');
 		
 		?>
	</body>
</html>
<?php

?>
				
