<!DOCTYPE html>
<html>
	<head>
		<link rel= "stylesheet" href="css/primary.css">
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
							<a href="photography.php">Photography</a>
						</li> 
						<li>
							<a href="painting.php">Paintings and color</a>
						</li> 
						<li>
							<a href="literature.php">Literature</a>
						</li>
						<li>
							<a href="animation.php">Film & Animation</a>
						</li>
						<li>
							<a href="fashion.php">Fashion Designing</a>
						</li>
						<li>
							<a href="artisan.php">Artisan Crafts</a>
						</li>
						<li>
							<a href="food.php">Foodylicious</a>
						</li>
				</div>
				<div id = "content">
					<table id="table_home">
						<?php
							$con=mysqli_connect("localhost","root","","artesania");
							if(!$con){
								die("Connection error".mysqli_connect_error());
							}
							$query="select path from products order by upload_time DESC LIMIT 12";
							$result=mysqli_query($con,$query);
							$count=1;
							if((mysqli_num_rows($result))>=1){
								echo "<tr>";
								while($row = mysqli_fetch_array($result)) {
									if($count>4) {
									echo "</tr> <tr>";
									$count=1;
									}
									echo "<td><a href='product_profile.php?path=".$row['path']."'><embed src='".$row['path']."'></embed></a></td>";
									$count++;
								}
								echo "</tr>";
							}
							else
							die("Some Problem occured in retrieving images from the database");
							mysqli_close($con);
						?>
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
				
