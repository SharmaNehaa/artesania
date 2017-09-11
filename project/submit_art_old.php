<!DOCTYPE html>
<html>
	
	<?php
		session_start();
		include_once 'accesscontrol.php';
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}

	?>
	<head>
		<link rel= "stylesheet" href="css/primary.css">
		<link rel= "stylesheet" href="css/submit_art.css">
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
						<a href="home.html">Home</a>
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

			<div id ="main">
				
				<div id = "content">
					
						<div id="upload_area">
							<p id="para">CREATE YOUR ART</p>
							<div id="area">
								<form action="upload_art.php" method="post" enctype="multipart/form-data">
									<input type="file" name="file" id="file"><br>
									<input type="submit" name="submit" value="Upload Image">
								</form>
								<a id="link" href="#">Enter Text</a>
							</div>
						</div>
							<form action="submitProcess.php" method="post">	
								<input type="text" id="title" placeholder="Title" name="title" ></input>
								<textarea type="text"  cols="40" rows="5"id="desc" placeholder="Description" name="desc"></textarea>
								<p id="para">CHOOSE CATEGORY</p>
								<select name="category" label="Category">
									<optgroup label="Photography">
									<option value="abstract">Abstract</option>
									<option value="portrait">Portrait</option>
									<option value="people">People</option>
									<option value="still_life">Still Life</option>
									<option value="sport">Sport</option>
									<option value="nature">Nature</option></optgroup>

									<optgroup label="Painting">
									<option value="oil">Oil Painting</option>
									<option value="acrylic">Acrylic Painting</option>
									<option value="pastel">Pastel</option>
									<option value="watercolor">Water Color</option>
									<option value="ink">Ink Painting</option>
									<option value="hot_wax">Hot Wax</option></optgroup>

									<optgroup label="Recipes">
									<option value="n_indian">North Indian</option>
									<option value="s_indian">South Indian</option>
									<option value="chinese">Chinese</option>
									<option value="italian">Italian</option>
									<option value="magolian">Mangolian</option></optgroup>

									<optgroup label="Film and Animation">
									<option value="documentry">Documentry</option>
									<option value="promotional">Promotional Video</option></optgroup>

									<optgroup label="Literature">
									<option value="poem">Poem</option>
									<option value="article">Article</option>
									<option value="essay">Essay</option>
									<option value="story">Short Story</option></optgroup>

									<optgroup label="Fashion">
									<option value="shoes">Shoes</option>
									<option value="clothing">Clothing</option>
									<option value="accessories">Accessories</option></optgroup>

									<optgroup label="Artisan Craft">
									<option value="basketry">Basketry and Weaving</option>
									<option value="ceramic">Ceramics</option>
									<option value="pottery">Pottery and Clay</option>
									<option value="cullinary">Cullinary Arts</option>
									<option value="miscellaneous">Miscellaneous</option></optgroup>
							       </select>
							</form>
					<button id="btn" value= "submit" type="button" name="submit" onclick="location.href='submitProcess.php';">Go</button>
												
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p>
			</div>
		</div><!--div container close-->
	</body>
</html>
				
