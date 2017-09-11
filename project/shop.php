<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/shop.css">

	<style>
		.product_price{
			margin-left:120px;
			margin-top:8px;
		}
	</style>';
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
			<a href="shop.php?category=photography" >Photography</a>
		</li> 
		<li>
			<a href="shop.php?category=painting" >Paintings and color</a>
		</li> 
		<li>
			<a href="shop.php?category=literature" >Literature</a>
		</li>
		<li>
			<a href="shop.php?category=animation" >Film & Animation</a>
		</li>
		<li>
			<a href="shop.php?category=fashion" >Fashion Designing</a>
		</li>
		<li>
			<a href="shop.php?category=artisan" >Artisan Crafts</a>
		</li>
		<li>
			<a href="shop.php?category=food" >Foodylicious</a>
		</li>
	</ul>
</div>
				<div id = "content">
					
						<?php
							$con=mysqli_connect("localhost","root","","artesania");
							if(!$con){
								die("Connection error".mysqli_connect_error());
							}
							if(!isset($_GET['category'])){
								$query="select * from products where on_sale='yes' order by upload_time DESC LIMIT 12";
							}
							else{
								$query="select * from products where on_sale='yes' and category='".$_GET['category']."' order by upload_time DESC LIMIT 12";
								}
								$result=mysqli_query($con,$query);
							if((mysqli_num_rows($result))>=1){
								
								while($row = mysqli_fetch_array($result)) {	
									$query1="select count(comment) from comments where product_id=".$row['product_id'];
									$result1=mysqli_query($con,$query1);
									$row1 = mysqli_fetch_array($result1);
									$query2="select price from ".$row['category']." where product_id=".$row['product_id']."";
									$result2=mysqli_query($con,$query2);
									$row2 = mysqli_fetch_array($result2);
									echo "
										<div class='image_box'>
											<div class='div_a'>
												<a href='product_profile.php?path=".$row['path']."'><embed src='".$row['path']."'></embed></a>
											</div>
											<div class='product_details'>
												<div class ='product_artist'>
													<img src='images/fav_art.gif'></img><a href='artist_profile.php?username=".$row['username']."'>".$row['username']."</a>
												</div>
												<div class ='product_price'>
													Rs.".$row2['price']."
												</div>
												<div class='clear'></div>
												<div class ='product_upvotes'>
													<a href='increment_upvotes.php?path=".$row['path']."&caller_page=home.php'><img src='images/favourite.png'></img></a>".$row['upvotes']."
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
				
