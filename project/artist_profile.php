
	<?php

		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}

	?>
<?php
include 'header.html';
//include any specific css file

echo 	'<link rel= "stylesheet" href="css/artist_profile.css">
		<style>
		#art p a{
			text-decoration:none;
		}
		#recommend{
			padding-top:25px;
		}
		</style>

	</head>';
include "header2.php";
include "profileLoginHeader.php";
?>
				
				<div id = "content">
					<div id="new_art">
						<div id="head">
							<img src="images/gallery_icon.png"></img>
							<h2>Newest Art Pieces</h2>
						</div>
						<div id="art">
							<?php 
								$query="select * from products where username='".$_GET['username']."'";
								$count=1;
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
						<p>Wanna see more from <?php echo $_GET['username'];?>? <a href="gallery.php?username=<?php echo $_GET['username'];?>">Click Here</a></p>
					</div>
					<div id="favourite">
						<div id="head">
							<img src="images/fav.png"></img>
							<h2>Favourite</h2>
						</div>
							<div id="fav">
							<?php 
								$query="select path from products where product_id in (select product_id from favourite where username='".$_GET['username']."')";

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
							$query="select * from user_details where username='".$_GET['username']."'";

							$result=mysqli_query($con,$query);
							if((mysqli_num_rows($result))==1){
								$row = mysqli_fetch_array($result);
								$src=$row['dp_name'];
								echo "<img src = '$src' ></img>";
							}
							else
							die("Try again");

							 ?>
							
						</div>

						<div id="text"> <?php
								echo '~ '.$_GET['username'].''; ?>
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
					
					<div id="about">
						<div id="head">
							<img src="images/ad_icon.png"></img>
							<h2 >About the Artist</h2>
						</div>
						<div id="about_body">
						
							<h1>Interests</h1>
							<?php
									$query="select * from interests where username='".$_GET['username']."'";
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
										$query="select count(*) from recommendations where artist='".$_GET['username']."'";
										$result = mysqli_query($conn,$query);
										$row = mysqli_fetch_array($result);
										echo "<p><a href='recommended_by.php?username=".$_GET['username']."'>".$row['count(*)']." artists </a>recommend ".$_GET['username']."</p>";
										
								?>
								<img src="images/recommendation.png"></img>
								<p>Impressed by <?php echo $_GET['username']?>'s work? <a href="recommend.php?artist=<?php echo $_GET['username']?>">Recommend him/her</a></p>
						</div>
					</div>

				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p><br>
				<a href="advertise.php">Advertise</a>
			</div>
		</div><!--div container close-->
	</body>
</html>
				
