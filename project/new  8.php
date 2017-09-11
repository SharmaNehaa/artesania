<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/product_profile.css">';
echo "</head>";
include "header2.php";
?>
	<div id="content">
		<div id="div_center">
			<div id="image">
				<?php
					$con=mysqli_connect("localhost","root","","artesania");
					if(!$con){
						die("Connection error".mysqli_connect_error());
					}
					$query="select * from products where path='images/download1.jpg'";
					$result=mysqli_query($con,$query);
					if((mysqli_num_rows($result))>=1){
						$row = mysqli_fetch_array($result);					
							echo "<embed src='".$row['path']."'></embed>";		
					}
					else
						die("222222Some Problem occured in retrieving images from the database");
					
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
							if(!$result2)
							if((mysqli_num_rows($result2))>=1){
								$row2 = mysqli_fetch_array($result2);
								$query3="select dp_name from user_details where username='".$row2['username']."'";
								$result3=mysqli_query($con,$query3);
								$row3 = mysqli_fetch_array($result3);
								echo "<embed class='icon_dp' src='".$row3['dp_name']."'></embed>";		
								//echo $row3['category']." / ".$row2['subcategory'];		
							}
							
					?>
					</div>
				</div>
			</div>
			<div id="image_descp">
				<?php echo $row['description'];
				?>
			</div>
			<div id="add_comment">
				<embed class='icon_dp' src="images/comment_smiley.gif"></embed>
				<div id="text_area">
					<textarea type="text" cols="93" rows="5" id="ta" placeholder="Add a comment" name="desc"></textarea>
				</div>
				<button value= "submit" type="button" name="submit_comment" id="submit_button" onclick="location.href='#';">Submit Comment</button>
			</div>
			<?php
							$query2="select * from comments where product_id='".$row['product_id']."'";
							
							$result2=mysqli_query($con,$query2);
							if((mysqli_num_rows($result2))>=1){
								while($row2 = mysqli_fetch_array($result2)) {
									echo '<div id="user_comment">
											<embed class='icon_dp' src=""></embed>
										</div>';
									
									
								}
							}
							else
							die("Some Problem occured in retrieving images from the database");
					?>
			
			
		</div>
		<div id="div_side">
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
