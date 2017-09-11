<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/product_profile.css">';
echo "</head>";
include "header2.php";
include "profileLoginHeader.php";

?>
	<div id="content">
		<div id="div_center">
			<div id="image">
				<?php
					
					$con=mysqli_connect("localhost","root","","artesania");
					if(!$con){
						die("Connection error".mysqli_connect_error());
					}
					$query="select * from products where path='".$_GET['path']."'";
					$_SESSION['path']=$_GET['path'];
					$result=mysqli_query($con,$query);
					if((mysqli_num_rows($result))>=1){
						$row = mysqli_fetch_array($result);					
							echo "<embed src='".$row['path']."'></embed>";		
					}
					else
						die("Some Problem occured in retrieving images from the database");
					
					$query11="update products set views=views+1 where path='".$_GET['path']."'";
					
					if(!mysqli_query($con,$query11)){
						die("some problem");
					}
					$price=NULL;
					$size=NULL;
					if($row['on_sale']=='yes'){
						if(isset($row['price']))
							$price=$row['price'];
						if(isset($row['size']))
							$size=$row['size'];
					}
					
					
					$query1="select upload_time, views from products where product_id=".$row['product_id']."";
					$result1=mysqli_query($con,$query1);					
					$row1=mysqli_fetch_array($result1);
					$submit_date=strtotime($row1['upload_time']);
					$date = date('d-m-Y', $submit_date);
					$views=$row1['views'];
					
					$query1="select count(*) from favourite where product_id=".$row['product_id'];
					$result1=mysqli_query($con,$query1);					
					$row1=mysqli_fetch_array($result1);
					$fav=$row1['count(*)'];
					
					$query1="select count(*) from comments where product_id=".$row['product_id'];
					$result1=mysqli_query($con,$query1);					
					$row1=mysqli_fetch_array($result1);
					$comment=$row1['count(*)'];
					
					$upvotes=$row['upvotes'];	
						
				?>				
			</div>
				
			<div id="artist_details">
				<?php
				$query1="select * from user_details where username='".$row['username']."'";
					$result1=mysqli_query($con,$query1);
					if((mysqli_num_rows($result1))>=1){
						$row1 = mysqli_fetch_array($result1);				
							
							echo "<embed class='icon_dp' src='".$row1['dp_name']."'></embed>";		
					}
					else
						die("111Some Problem occured in retrieving images from the database");
				?>
				<div id="image_info" >
					<div id="caption">
					<h1><?php echo $row['caption'];?>
					</h1>
					</div>
					<div id="artist_name">
					<?php echo "<a href='artist_profile.php?username=".$row1['username']."'>".$row1['username']."</a>";
					?>
					</div>
					<div id="subcategory">
						<?php
							$query2="select subcategory from ".$row['category']." where product_id='".$row['product_id']."'";
							$result2=mysqli_query($con,$query2);
							if((mysqli_num_rows($result2))>=1){
								$row2 = mysqli_fetch_array($result2);									
								echo $row['category']." / ".$row2['subcategory'];		
							}
							
					?>
					</div>
					<div id="no_upvotes">
						<?php	echo $upvotes." Upvotes";	?>
					</div>
				</div>
				
				<div id="upvote_area"> 
					<?php if(isset($_SESSION['username'])){
							$query4="select * from upvotes where username='".$_SESSION['username']."' and path='".$_GET['path']."'";
							$result4=mysqli_query($con,$query4);
							if((mysqli_num_rows($result4))>=1){
								echo "<a href='decrement_upvotes.php?path=".$row['path']."'><img src='images/downvote.png'></img></a>";
							}
							else{
								echo "<a href='increment_upvotes.php?path=".$row['path']."'><img src='images/upvote.png'></img></a>";
							}
						}
						else{
								echo "<a href='increment_upvotes.php?path=".$row['path']."'><img src='images/upvote.png'></img></a>";
						}
					?>
					<a href="add_fav.php?path=<?php echo $row['path']?>&product_id=<?php echo $row['product_id'] ?>"><img src="images/favourite.png"></img></a>
					<a href="shop_product.php?product_id=<?php echo $row['product_id']?>&path=<?php echo $row['path'] ?>"><img src="images/shop_icon.png"></img></a>
					<a href="report_image.php?product_id=<?php echo $row['product_id']?>&path=<?php echo $row['path'] ?>"><img src="images/fella_block.jpg"></img></a>
				</div>
				<div class="clear">
				</div>

			</div>
			
			<div id="image_descp">
				<?php echo $row['description'];
				?>
				
			</div>
			
			<div id="add_comment">
				<embed class='icon_dp' src="images/comment_smiley.gif"></embed>
				<form method="POST" action="submit_commentProcess.php">
				<div id="text_area">
					<textarea type="text" cols="93" rows="5" id="ta" placeholder="Add a comment" name="desc"></textarea>
				</div>
				<input value= "Submit Comment" type="submit" name="submit_comment" id="submit_button"></input>
				</form>
			</div>
			<?php
				$_SESSION['prod_id']=$row['product_id'];
				$query2="select * from comments where product_id='".$row['product_id']."'";							
				$result2=mysqli_query($con,$query2);
				//if(!$result2) {
					if((mysqli_num_rows($result2))>=1){
						while($row2 = mysqli_fetch_array($result2)) {
							$query3="select dp_name from user_details where username='".$row2['username']."'";
							$result3=mysqli_query($con,$query3);
							$row3 = mysqli_fetch_array($result3);
							$timestamp = strtotime($row2['comment_time']);
							$date = date('d-m-Y', $timestamp);
							echo "<div id='user_comment'>
									<embed class='icon_dp' src='".$row3['dp_name']."'></embed>
									<div class='text_dabba'>
										<div id='row1c1'>
											<a href='artist_profile.php?username=".$row2['username']."'><h1>".$row2['username']."</h1>
										</div>
										<div id='row1c2'>
											".$date."
										</div>
										<br></br>
										<div id='row2c1'>
											".$row2['comment']."
										</div>
									</div>
								</div>";
							
							
						}
					}
							
			?>
		</div>
		<div id="div_side">
			<div id="artist_more">
				<a href="gallery.php?username=<?php echo $row['username']?>"><h2>More from this Artist</h2></a>
				<div id="sample_artist">
					<?php
						$query="select * from products where username='".$row['username']."' order by upvotes DESC LIMIT 6";
						$result=mysqli_query($con,$query);
						$count=1;
						echo "<table>";
						if((mysqli_num_rows($result))>=1){
							echo "<tr>";
							while($row = mysqli_fetch_array($result)) {
								if($count>3) {
								echo "</tr> <tr>";
								$count=1;
								}
								echo "<td><a href='product_profile.php?path=".$row['path']."'><embed src='".$row['path']."'></embed></a></td>";
								$count++;
							}
							echo "</tr>";
						}
						else
						die("Some Problem occured while retrieving images from the database");
						echo "</table>";
					?>
				</div>
			
			</div>
			<div id="artesania_more">
				<a href="home.php"><h2>More on Artesania</h2></a>
				<div id="sample_artesania">
				<?php
					$query="select * from products order by upvotes DESC LIMIT 6";
					$result=mysqli_query($con,$query);
					$count=1;
					echo "<table>";
					if((mysqli_num_rows($result))>=1){
						echo "<tr>";
						while($row = mysqli_fetch_array($result)) {
							if($count>3) {
							echo "</tr> <tr>";
							$count=1;
							}
							echo "<td><a href='product_profile.php?path=".$row['path']."'><embed src='".$row['path']."'></embed></a></td>";
							$count++;
						}
						echo "</tr>";
					}
					else
						die("Some Problem occured while retrieving images from the database");
					echo "</table>";
					
					
					
					
				?>
				</div>
			</div>
			<div id="image_details">
				<h2>Details</h2>
				<form action="payment_gateway.php" method="post">
					<table id="details">
						<tr>
							<td>Submitted on:</td>
							<td><?php echo $date?></td>
						</tr>
						<tr>
							<td>Page Views:</td>
							<td><?php echo $views?></td>
						</tr>
						<tr>
							<td>Favourites:</td>
							<td><?php echo $fav?></td>
						</tr>
						<tr>
							<td>Comments:</td>
							<td><?php echo $comment?></td>
						</tr>
						<?php
						if($price!=NULL) {
							echo "<tr>
							<td>Price:</td>
							<td>".$price."</td>
						</tr>";
						}
						if($size!=NULL) {
							echo "<tr>
							<td>Size:</td>
							<td>".$size."</td>
						</tr>";
						}
						?>
					</table>
				</form>
			</div>
		</div>
	
	</div>
	<div class="clear"></div>
	<?php mysqli_close($con);?>
</div> <!--close main-->
<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>
