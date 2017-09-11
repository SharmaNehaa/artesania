<!DOCTYPE html>
<html>
	<head>
		<link rel= "stylesheet" href="css/primary.css">
		<link rel= "stylesheet" href="css/box.css">
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
						<button value= "SignIn" type="button" name="Signin">Sign In</button>
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
						<a href="artists.php">Artists</a>
					</li>
					<li>
						<a href="whats_hot.php">What's Hot!</a>
					</li>
					<li>
						<a href="about_us.php">About Us</a>
					</li>
					<li>
						<a href="tour.php">Take a Tour</a>
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
				<div id = "side">
					<ul>
						<lh>
							<a href="#">Recent</a>
						</lh>
						<div class="clear"></div>
						 <lh>
							<a href="#">Category</a>
						</lh></br>
						<li>
							<a href="#">Photography</a>
						</li> 
						<li>
							<a href="#">Paintings and color</a>
						</li> 
						<li>
							<a href="#">Literature</a>
						</li>
						<li>
							<a href="#">Film & Animation</a>
						</li>
						<li>
							<a href="#">Fashion Designing</a>
						</li>
						<li>
							<a href="#">Artisan Crafts</a>
						</li>
						<li>
							<a href="#">Foodylicious</a>
						</li>
				</div>
				<div id = "content">
					<div class="box" id="interest_form">
						<h3 align="center">Interests</h3>
						<hr align="center" width:"100%">
						<form action="interestProcess.php" method="post" id="interestsForm">
			
						<table align="center" id="table">
							<tr>
								<td><label>Favourite visual artist</label>
								<td><input type="text" name="artist"></input></td>
							</tr>
							<tr>
								<td><label>Favourite movies</label>
								<td><input type="text" name="movie"></input></td>
							</tr>
							<tr>
								<td><label>Favourite bands/musical artists</label>
								<td><input type="text" name="band_music" ></input></td>
							</tr>
							<tr>
								<td><label>Favourite books</label>
								<td><input type="text" name="book"></input></td>
							</tr>
							<tr>
								<td><label>Favourite writers</label>
								<td><input type="text" name="writer" ></input></td>
							</tr>
							<tr>
								<td><label>Favourite cuisine</label>
								<td><input type="text" name="cuisine" ></input></td>
							</tr>
							<tr>
								<td><label>Favourite designer brands</label>
								<td><input type="text" name="fashion_brand" ></input></td>
							</tr>
							<tr>
								<td><label>Favourite fashion designers</label>
								<td><input type="text" name="fashion_designer" ></input></td>
							</tr>
							<tr>
								<td><label>Favourite paint</label>
								<td><input type="text" name="painter" ></input></td>
							</tr>
							<tr>
								<td><label>Favourite category</label>
								<td><input type="text" name="category" ></input></td>
							</tr>
							<tr>
								<td><label>Favourite subcategory</label>
								<td><input type="text" name="subcategory" ></input></td>
							</tr>									
							<tr>
								<td><input type="submit" value="SUBMIT" class="button" ></input></td>
							</tr>

						</table>
						</form>
					</div><!--interest div -->
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p>
			</div>
		</div><!--div container close-->
	</body>
</html>
				
