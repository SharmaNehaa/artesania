<?php
include 'header.html';
//include any specific css file
?>
<script src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#side').css("height",$('#content').height()) ;
		});
	</script>
<?php
echo "</head>";
include "header2.php";
include "profileLoginHeader.php";

?>
				<div id = "side">
	<ul>
		<lh>
			<a href="gallery.php?username=<?php echo $_GET['username'] ?>">Recent</a>
		</lh>
		<div class="clear"></div>
		 <lh>
			<a href="#">Category</a>
		</lh></br>
		<li>
			<a href="gallery.php?category=photography&username=<?php echo $_GET['username'] ?>" >Photography</a>
		</li> 
		<li>
			<a href="gallery.php?category=painting&username=<?php echo $_GET['username'] ?> " >Paintings and color</a>
		</li> 
		<li>
			<a href="gallery.php?category=literature&username=<?php echo $_GET['username'] ?> " >Literature</a>
		</li>
		<li>
			<a href="gallery.php?category=animation&username=<?php echo $_GET['username'] ?> " >Film & Animation</a>
		</li>
		<li>
			<a href="gallery.php?category=fashion&username=<?php echo $_GET['username'] ?> " >Fashion Designing</a>
		</li>
		<li>
			<a href="gallery.php?category=artisan&username=<?php echo $_GET['username'] ?> " >Artisan Crafts</a>
		</li>
		<li>
			<a href="gallery.php?category=food&username=<?php echo $_GET['username'] ?> " >Foodylicious</a>
		</li>
	</ul>
</div>
				<div id = "content">
						<?php
							
							$con=mysqli_connect("localhost","root","","artesania");
							if(!$con){
								die("Connection error".mysqli_connect_error());
							}
							if(!isset($_GET['category'])) {
								$query="select * from products where username='".$_GET['username']."' order by upload_time DESC LIMIT 12";
							}
							else {
								$query="select * from products where category= '".$_GET['category']."' and username='".$_GET['username']."' order by upload_time DESC LIMIT 12";
							}
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
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
		<?php 
			include "footer.php";
		?>
		</div><!--div container close-->
	</body>
</html>
				
