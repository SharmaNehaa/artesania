<?php
include 'header.html';
//include any specific css file
echo "</head>";
include "header2.php";
include "profileLoginHeader.php";
include "sidebar.html";
?>

				<div id = "content">
					<table id="table_home">
						<?php
							
							$con=mysqli_connect("localhost","root","","artesania");
							if(!$con){
								die("Connection error".mysqli_connect_error());
							}
							$query="select * from products where product_id in (select product_id from favourite where username='".$_SESSION['username']."' order by upload_time DESC ) LIMIT 12";
							$result=mysqli_query($con,$query);
							$count=1;
							if((mysqli_num_rows($result))>=1){
								while($row = mysqli_fetch_array($result)) {
									$query1="select count(comment) from comments where product_id=".$row['product_id'];
									$result1=mysqli_query($con,$query1);
									$row1 = mysqli_fetch_array($result1);
									echo "
										<div class='image_box'>
											<div class='div_a'>
												<a href='product_profile.php?path=".$row['path']."'><embed src='".$row['path']."'></embed></a>
											</div>
											<div class='product_details'>
												<div class ='product_artist'>
													<img src='images/fav_art.gif'></img><a href='artist_profile.php?username=".$row['username']."'>".$row['username']."</a>
												</div>
												<div class ='product_upvotes'>
													<a href='increment_upvotes.php?path=".$row['path']."&caller_page=whats_hot.php'><img src='images/favourite.png'></img></a>".$row['upvotes']."
												</div>
												<div class ='product_comments'>
													<img src='images/Messages_icon.png'></img>".$row1['count(comment)']."
												</div>
												<div class='clear'></div>
											</div>
										</div>
										
										";
								}								
							}							
							mysqli_close($con);
						?>
					</table>
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
	<?php 
		include "footer.php";
	?>
		</div><!--div container close-->
	</body>
</html>
				
