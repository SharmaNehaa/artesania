<!DOCTYPE html>
<html>
	<head>
		<link rel= "stylesheet" href="css/primary.css">
		<link rel= "stylesheet" href="css/profile_pic.css">
	</head>
	<?php
		include_once 'accesscontrol.php';
		session_start();

		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}
	?>
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
						<a href="home.html">Home</a>
					</li>
					 <li>
						<a href="artist.html">Artists</a>
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
											<h3 align="center">CHOOSE A UNIQUE AVATAR FOR YOU!</h3>
						<hr>
					<div id="orange">
						<div id="current_avatar">
							<?php 
							$query="select dp_name from user_details where username='".$_SESSION['username']."'";

							$result=mysqli_query($con,$query);
							if((mysqli_num_rows($result))==1){
								$row = mysqli_fetch_array($result);
								$src1=$row['dp_name'];
								$src2="images/";
						
								$src=$src2.$src1;
	
								echo "<img src = '$src' ></img>";
							}
							else
							die("Registration failed.Try again");

							mysqli_close($con); ?>
						</div>
							<p id="para">Choose your favourite avatar</p>
							<form action="setAvatar.php" method="post">
							<table id="avatar">
						          <tr>
	    							<td width=180px><img src="images/default_avatar_blue.png"></img></td>	    
	     							<td width=180px><img src="images/default_avatar_pink.png"></img></td>
	     							<td width=180px><img src="images/default_avatar_green.png"></img></td>
          						  </tr>
										
						          <tr>
	    							<td width=220px><input type="radio" name="avatar" value="default_avatar_blue.png"></td>	    
	     							<td width=220px><input type="radio" name="avatar" value="default_avatar_pink.png"></td></br>
	     							<td width=220px><input type="radio" name="avatar" value="default_avatar_green.png"></td>
          						  </tr>
							  <tr>
								<input type="submit" value="Select">
							  </tr>
							</table>
							</form>
							<p id="para">An avatar image file should be a maximum 50x50px PNG, JPEG or GIF image that is smaller than 15 KB</p>
						<form action="upload_file.php" method="post" enctype="multipart/form-data">
							<label for="file">Filename:</label>
							<input type="file" name="file" id="file"><br>
							<input type="submit" name="submit" value="Upload Image">
						</form>
					</div>

				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p>
			</div>
		</div><!--div container close-->
	</body>
</html>
				
