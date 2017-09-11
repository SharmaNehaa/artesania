<!DOCTYPE html>
<html>
	<head>
		<link rel= "stylesheet" href="css/primary.css">
		<link rel= "stylesheet" href="css/sign_up.css">
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
						</ul>
					
					</div>
				
					<div id = "content">
						<h2 align="center">JOIN ARTESANIA FOR FREE</h2>
						<hr>
								<form action="signupProcess.php" method="post" id="orange">
						

									
										<input type="text" name="username" placeholder="Username"></input>
									
										<input type="email" name="email_id" placeholder="Email Address"></input>
									
										<input type="email" name="email_id1" placeholder="Retype Email Address"></input>
									
										<input type="password" name="pwd" placeholder="Password"></input>
										<div class="clear"></div>
										<br>
										<div id="div_gender">
									    GENDER
								
									     <input type="radio" name="gender" value="male" id="radio1">Male</input>
									     <input type="radio" name="gender" value="female" id="radio2">Female</input> 
									     </div>
									     <div class="clear"></div>
										<br>
										<div id="div_dob">
										BIRTHDATE
								
										
										
											<select name=birthMonth>
												<option value="">Month</option>
												<option value="1">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>	
											<select name=birthDay>
												<option value="">Day</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="12">13</option>
												<option value="12">14</option>
												<option value="12">15</option>
												<option value="12">16</option>
												<option value="12">17</option>
												<option value="12">18</option>
												<option value="12">19</option>
												<option value="12">20</option>
												<option value="12">21</option>
												<option value="12">22</option>
												<option value="12">23</option>
												<option value="12">24</option>
												<option value="12">25</option>
												<option value="12">26</option>
												<option value="12">27</option>
												<option value="12">28</option>
												<option value="12">29</option>
												<option value="12">30</option>
												<option value="12">31</option>
											</select>	
											<select name=birthYear>
												<option value="">Year</option>
												<option value="2013">2013</option>
												<option value="2012">2012</option>
												<option value="2011">2011</option>
												<option value="2010">2010</option>
												<option value="2009">2009</option>
												<option value="2008">2008</option>
												<option value="2007">2007</option>
												<option value="2006">2006</option>
												<option value="2005">2005</option>
												<option value="2004">2004</option>
												<option value="2003">2003</option>
												<option value="2002">2002</option>
												<option value="2001">2001</option>
												<option value="2000">2000</option>
												<option value="1999">1999</option>
												<option value="1998">1998</option>
												<option value="1997">1997</option>
												<option value="1996">1996</option>
												<option value="1995">1995</option>
												<option value="1994">1994</option>
												<option value="1993">1993</option>
												<option value="1992">1992</option>
												<option value="1991">1991</option>
												<option value="1990">1990</option>
											</select>	

										</div>
										<div class="clear"></div>
										<input type="submit" id="submit_button" value="BE AN ARTISTA" class="button1" ></input>
									
								</form>

					</div>

				<div class="clear"></div>
				<div id="footer">
					<p>Artesania 2013 All Rights Reserved</p>
				</div>
			
		</div>
	</body>
</html>
				
