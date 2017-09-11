<!DOCTYPE html>
<html>

	<?php
		session_start();
		if(!isset($_SESSION['username'])){
			$_SESSION['username']="Guest";
		}
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}
	?>
	<head>
		<link rel= "stylesheet" href="css/primary.css">
		<link rel= "stylesheet" href="css/profile_view.css">
		</style>
	</head>
	<body>
		<div id = "container"> 	<!--main container of our page. to wrap the content in a specific width. Will contain header, main, left side, footer-->
			<div id="header">
				<div id="logo">
						<img src="images/LOGO.jpg" alt="Artesania" ></img>
						<div class="para">An online community for art enthusiasts!</div>						
				</div>	
				<p id="welcm">
				<?php
					echo 'Welcome  '.$_SESSION['username'].'!';
				?>
				</p>
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
		<!-- This is the user menu which is shown only when user is logged in -->
			<div id="user_menu">
				<ul >
					<li>
						<a href="#">Artista ~				
							<?php
								echo ''.$_SESSION['username'].'';
							?>
						</a>
					</li>
					 <li >
						<img src="images/profile_icon.png"></img>
						<a href="profile.php">Profile</a>
					</li>
					<li>
						<img src="images/gallery_icon.png"></img>
						<a href="#">Gallery</a>
					</li>
					<li>
						<img src="images/fav.png"></img>
						<a href="#">Favourites</a>
					</li>
					<li>
						<img src="images/shop_icon.png"></img>
						<a href="#">Shop</a>
					</li>
					<li>
						<img src="images/submit_icon.png"></img>
						<a href="#">Submit</a>
					</li>
					<li>
						<img src="images/logout.png"></img>
						<a href="logout.php">Log Out</a>
					</li>				
				</ul>
			</div>
			<div id ="main">				
				<div id = "content">
					<div id="new_art">
						<div id="head">
							<img src="images/gallery_icon.png"></img>
							<h2>Newest Art Pieces</h2>
						</div>
							<div id="art">
							<?php 
								$query="select * from products where username='".$_SESSION['profile_username']."'";
								$result=mysqli_query($con,$query);
								if((mysqli_num_rows($result))>=1){
											$count=1;
											while(($row=mysqli_fetch_assoc($result)) && $count<=4){
									?>	
										<div id="art_in2"><img src="<?php echo $row['path'];?>"></img></div>
									<?php
									$count++;
									}
								}
								
								if($count<4){
									while($count<=4){
										?> <div id="art_in1"><img src="images/default_image.jpg"></div> <?php
										$count++;
									}
								}
								 ?>
							</div>
					</div>

					<div id="denizen_id">
						<div id="head">
							<img src="images/profile_icon.png"></img>
							<h2>Artesania Denizen ID</h2>
						</div>

						<div id="pic">
							
						<?php 
							$query="select * from user_details where username='".$_SESSION['profile_username']."'";

							$result=mysqli_query($con,$query);
							if((mysqli_num_rows($result))==1){
								$row = mysqli_fetch_array($result);
								$src=$row['dp_name'];
						
							
	
								echo "<img src = '$src' ></img>";
							}
							else
							die("Registration failed.Try again");

							 ?>
							
						</div>

						<div id="text"> <?php
								echo '~ '.$_SESSION['profile_username'].''; ?>
								<div id="s_text">
								<?php	
									echo $row['email'];
								?>
								</div>
						</div>
					</div>
					<div id="favourite">
						<div id="head">
							<img src="images/fav.png"></img>
							<h2>Favourite</h2>
						</div>
							<div id="fav">
							<?php 
								$query="select path from products where product_id in (select product_id from favourite where username='".$_SESSION['profile_username']."')";

								$result=mysqli_query($con,$query);
								if((mysqli_num_rows($result))>=1){
									$count=1;
									while(($row=mysqli_fetch_assoc($result)) && $count<=4){
										?>	
											<div id="art_in2"><img src="<?php echo $row['path'];?>"></img></div>
										<?php
										$count++;
									}
								}
								
								if($count<4){
									while($count<=4){
										?> <div id="art_in1"><img src="images/default_image.jpg"></div> <?php
										$count++;
									}
								}
								 ?>
							</div>

					</div>
					<div id="ad">
						<div id="head">
							<img src="images/ad_icon.png"></img>
							<h2 >AdCast Ads from Community</h2>
						</div>
						<div id="ad_body">
							<?php 

					    $conn=mysqli_connect("localhost","root","","artesania");
						if(!$conn){
							die("Connection error".mysqli_connect_error());
						}

					    if(!isset($_GET['Clicked'])){
					    $result = mysqli_query($conn,"select * FROM advertisement ORDER BY RAND()");
					    $row = mysqli_fetch_array($result);   

					    mysqli_query($conn,"update advertisement set clicks = clicks + 1 WHERE ad_id = '" . $row['ad_id'] . "'") or die(mysql_error());
					    mysqli_query($conn,"delete from advertisement where clicks >= max_clicks");

					    $url = "profile.php";
					    echo "<a href='".$row['redirect_url']."'><img src='".$row['path']."' /></a>";

					}

						echo "<p>Uploaded by: ".$row['username']."</p>";
					mysqli_close($conn);

					?>
							
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p></br>
				<a href="advertise.php">Advertise</a>
			</div>
		</div><!--div container close-->
	</body>
</html>
				
