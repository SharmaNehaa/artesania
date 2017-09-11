<?php
	include 'header.html';
	echo '<link rel= "stylesheet" href="css/profile.css">';
	//echo '<link rel= "stylesheet" href="css/contentAlign.css">';
	//include any specific css file	
?>
	</head>
	<?php
		include "header2.php";
		include "profileLoginHeader.php";
		$con=mysqli_connect("localhost","root","","artesania");
					if(!$con){
						die("Connection error".mysqli_connect_error());
					}
	?>
	
				<div id = "content">
					<div id="new_art">
						<div id="head">
							<img src="images/gallery_icon.png"></img>
							<h2>Newest Art Pieces</h2>
						</div>
							<div id="art">
							<?php 
								$query="select * from products where username='".$_SESSION['username']."' order by upload_time DESC LIMIT 2";

								$result=mysqli_query($con,$query);
								if((mysqli_num_rows($result))==0){
									?>
										<div id="art_in1"><embed src="images/default_image.jpg"></div>
										<div id="art_in2"><embed src="images/default_image.jpg"></div>
										<p>Get started! Upload and publish your art -- maybe even get comments from your fellow deviants - or get added to their favourites! </p>
									<?php
								}
								else if((mysqli_num_rows($result))==1){
									$row = mysqli_fetch_array($result);
									?>
										<div id="art_in1"><embed src="<?php echo $row['path']?>"></div>
										<div id="art_in2"><embed src="images/default_image.jpg"></div>
										<p>Upload and publish your art -- maybe even get comments from your fellow deviants - or get added to their favourites! </p>
									<?php
								}
								else if((mysqli_num_rows($result))>=2){
									$row = mysqli_fetch_array($result);					
									?>
										<div id="art_in1"><a href="<?php echo $row['path']?>"><embed src="<?php echo $row['path']?>"></embed></a></div>
										<?php $row = mysqli_fetch_array($result);?>
										<div id="art_in2"><a href="<?php echo $row['path']?>"><embed src="<?php echo $row['path']?>"></embed></a></div>
										<p>Upload and publish your art -- maybe even get comments from your fellow deviants - or get added to their favourites! </p>
									<?php
								}
								else
								die("Registration failed.Try again");

								 ?>
							</div>
						<button value= "submit" type="button" name="submit" onclick="location.href='submit_art.php';">Upload Art</button>
					</div>
					<div id="favourite">
						<div id="head">
							<img src="images/fav.png"></img>
							<h2>Favourite</h2>
						</div>
							<div id="fav">
							<?php 
								$query="select path from products where product_id in (select product_id from favourite where username='".$_SESSION['username']."')";

								$result=mysqli_query($con,$query);
								if((mysqli_num_rows($result))==0){
									?>
										<div id="art_in1"><embed src="images/default_image.jpg"></div>
										<div id="art_in2"><embed src="images/default_image.jpg"></div>
										<p>Explore more! A lot of your taste to come!</p>
									<?php
								}
								else if((mysqli_num_rows($result))==1){
									$row = mysqli_fetch_array($result);
									?>
										<div id="art_in1"><a href="<?php echo $row['path']?>"><embed src="<?php echo $row['path']?>"></embed></a></div>
										<div id="art_in2"><embed src="images/default_image.jpg"></div>
										<p>Explore more! A lot of your taste to come! </p>
									<?php
								}
								else if((mysqli_num_rows($result))>=2){
									$row = mysqli_fetch_array($result);					
									?>
										<div id="art_in1"><a href="<?php echo $row['path']?>"><embed src="<?php echo $row['path']?>"></embed></a></div>
										<?php $row = mysqli_fetch_array($result);?>
										<div id="art_in2"><a href="<?php echo $row['path']?>"><embed src="<?php echo $row['path']?>"></embed></a></div>
										<p>Explore more! A lot of your taste to come! </p>
									<?php
								}
								else
								die("Registration failed.Try again");

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
							$query="select * from user_details where username='".$_SESSION['username']."'";

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
								echo '~ '.$_SESSION['username'].''; ?>
								</br>
								<div id="s_text">
								<?php	
									echo $row['email'];
								?>
								</div>
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
					

					?>
							
						</div>
					</div>
					<div class="clear"></div>
					<div id="about">
						<div id="head">
							<img src="images/ad_icon.png"></img>
							<h2 >About the Artist</h2>
						</div>
						<div id="about_body">
						
							<h1>Interests</h1>
							<?php
									$query="select * from interests where username='".$_SESSION['username']."'";
									$result = mysqli_query($conn,$query);
									$row = mysqli_fetch_array($result);
									echo "<table id='interests'>";
									if($row['artist']!=''){
										echo "<tr>
											<td><img src='images/fav_art.gif'></img></td>
											<td><p>Favourite Artist :</p></td>
											<td><p>".$row['artist']."</p></td>
											</tr>";
									}
									if($row['movie']!=''){
										echo "<tr>
											<td><img src='images/fav_movie.png'></img></td>
											<td><p>Favourite Movie :</p></td>
											<td><p>".$row['movie']."</p></td>
											</tr>";
									}
									if($row['band_music']!=''){
										echo "<tr>
											<td><img src='images/fav_band.png'></img></td>
											<td><p>Favourite Band Music :</p></td>
											<td><p>".$row['band_music']."</p></td>
											</tr>";
									}
									if($row['writer']!=''){
										echo "<tr>
											<td><img src='images/fav_writer.gif'></img></td>
											<td><p>Favourite Writer :</p></td>
											<td><p>".$row['writer']."</p></td>
											</tr>";
									}
									if($row['cuisine']!=''){
										echo "<tr>
											<td><img src='images/fav_cuisine.png'></img></td>
											<td><p>Favourite Cuisine :</p></td>
											<td><p>".$row['cuisine']."</p></td>
											</tr>";
									}
									if($row['fashion_brand']!=''){
										echo "<tr>
											<td><img src='images/fav_fashion.jpg'></img></td>
											<td><p>Favourite Fashion Brand :</p></td>
											<td><p>".$row['fashion_brand']."</p></td>
											</tr>";
									}
									if($row['category']!=''){
										echo "<tr>
											<td><img src='images/fav_category.png'></img></td>
											<td><p>Favourite Category :</p></td>
											<td><p>".$row['category']."</p></td>
											</tr>";
									}
									echo "</table>";					
							?>
						</div>
						<div id="recommend">
							<h1>Recommendations</h1><br>
							<?php
									$query="select count(*) from recommendations where artist='".$_SESSION['username']."'";
									$result = mysqli_query($conn,$query);
									$row = mysqli_fetch_array($result);
									echo "<p><a href='recommended_by.php?username=".$_SESSION['username']."'>".$row['count(*)']." artists </a>recommend you.</p>";
									
							?>
							<img src="images/recommendation.png"></img>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<?php 
				include "footer.php";
				?>
		</div><!--div container close-->
	</body>
</html>
				
