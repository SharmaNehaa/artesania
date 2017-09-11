<?php
	include 'header.html';
	echo '<link rel= "stylesheet" href="css/artists.css">';
	echo '<link rel= "stylesheet" href="css/contentAlign.css">';
	//include any specific css file	
?>
	</head>
	<?php
		include "header2.php";
		include "profileLoginHeader.php";
	?>

				<div id = "content">
					<?php
					$con=mysqli_connect("localhost","root","","artesania");
					if(!$con){
						die("connection error");
					}	
					$query="select * from user_details where username in(select distinct username from products)";
					$result=mysqli_query($con,$query);
						while($arr=mysqli_fetch_assoc($result)){
							?>
							<div id="area">
								<img src="<?php echo $arr['dp_name']?>"> </img>
								<div id="inner_area">
								<p id="inner_area_name" >~ <a href="artist_profile.php?username=<?php echo $arr['username']?>"><?php echo $arr['username']; $_SESSION['profile_username']=$arr['username']; ?></a></p>
								
								<p id="inner_area_int"><img src='images/interest.png'></img><strong>Interests: </strong>
								<?php $query1="select * from interests where username ='".$arr['username']."'";
									$result1=mysqli_query($con,$query1);
									$arr1=mysqli_fetch_assoc($result1);
									echo $arr1['category'];
								?>
								</p>
								<?php
										$query3="select count(*) from recommendations where artist='".$arr['username']."'";
										$result3 = mysqli_query($con,$query3);
										$row3 = mysqli_fetch_array($result3);
										echo "<p id='inner_area_rec'><img src='images/recommendation.png'></img><strong>Recommended By:</strong> <a href='recommended_by.php?username=".$arr['username']."'>".$row3['count(*)']." artists </a></p>";
										$query3="select count(*) from products where username='".$arr['username']."'";
										$result3 = mysqli_query($con,$query3);
										$row3 = mysqli_fetch_array($result3);
										echo "<p id='inner_area_up'><img src='images/submit_icon.png'></img><strong>Uploads: </strong> ".$row3['count(*)']."";
										
								?>
								</div>
							</div>
							<?php
						}
						
					?>
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<?php 
				include "footer.php";
			?>
		</div><!--div container close-->
	</body>
</html>
				
