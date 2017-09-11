<!DOCTYPE html>
<html>
	<head>
		<link rel= "stylesheet" href="css/primary.css">
		<link rel= "stylesheet" href="css/profile_pic.css">
	<style>
	#orange{
		padding-top:30px;
	}
	</style>
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
				<div id = "content" id="orange">
											<h3 align="center">ABOUT YOU</h3>
						<hr>
								<form action="aboutProcess.php" method="post" id="orange">
						
								<table align="center" id="table">
									<tr>
										<td><input type="text" name="name" placeholder="Your Name"></input></td>
									</tr>
									<tr>
										<td><input type="text" name="contact" placeholder="Contact"></input></td>
									</tr>
									<tr>
										<td><input type="text" name="address" placeholder="Residential Address"></input></td>
									</tr>
									<tr>
										<td><input type="text" name="bank_name" placeholder="Bank Name"></input></td>
									</tr>
									<tr>
										<td><input type="number" name="bank_acc_no" placeholder="Bank Account Number"></input></td>
									</tr>
									<tr>
										<td><input type="submit" value="SUBMIT" class="button" ></input></td>
									</tr>

								</table>
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p>
			</div>
		</div><!--div container close-->
	</body>
</html>
				
