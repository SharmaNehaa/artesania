<body>
<?php
session_start();
?>
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
					<?php
					if(!isset($_SESSION['username'])) {
						?>
							<div class="primary">
								<button value= "SignIn" type="button" name="Signin" onclick="location.href='sign_in.php'">Sign In</button>
								<button value="Register" type="button" name="Join" onclick="location.href='sign_up.php'">Join</button>
							</div>
						<?php
					}
					?>
					
				</div>
				<form action="search.php" id="left_pad" method="post">
					<input class="input" placeholder="Search" type="text" id="search" name="search"></input>
					<button type="submit" class="button">Go</button>
				</form>		
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
						<a href="pixture.php">Pixture</a>
					</li>
					<li>
						<a href="forum.php">Help</a>
					</li>
					
				</ul>
				<div class="clear"></div>
			</div>
