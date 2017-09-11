<?php
	include 'header.html';	
?>  
	<link rel= "stylesheet" href="css/profile.css">
	<link rel= "stylesheet" href="css/forum.css">
	<script src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#left_panel').css("height",$('#inner_content_area').height()) ;
		});
	</script>
	</head>
	
<?php	
	include 'header2.php';
	include 'profileLoginHeader.php';
?>
	<div id="main">
		<div id="content">
			<div class="line_block">
				<?php
					if(!isset($_GET['category'])) {
						$category="Forum";
					}
					else {
						$category=$_GET['category'];
						$_SESSION['category_id']=$_GET['category_id'];
					}
					
					$con=mysqli_connect("localhost","root","","artesania");
					if(!$con){
						die("Connection error".mysqli_connect_error());
					}
					if(!isset($_GET['category_id'])) {
					$query="select * from topics order by upvotes DESC";
					$result=mysqli_query($con,$query);
					}
					else {
						$category_id=$_GET['category_id'];
						$query="select * from topics where topic_cat=".$category_id." order by upvotes DESC";
						$result=mysqli_query($con,$query);
					}
					
				
				?>
				<p class="white_area">Category: <?php echo "\t".$category; ?></p>
			</div><!--line block -->
			<div id="inner_content">
				<div id="left_panel">
					<ul>
						<lh>
							<?php echo "<a href='forum.php'>Forum</a>";
							?>
						</lh>
						<lh>
							<a href="#">Other Categories</a>
						</lh>
						<li>
							<?php echo "<a href='forum.php?category_id=1&category=Feedback and Queries'>Feedback & Queries</a>"; ?>
						</li> 
						<li>
							<?php echo "<a href='forum.php?category_id=2&category=Photography'>Photography</a>"; ?>
						</li> 
						<li>
							<?php echo "<a href='forum.php?category_id=3&category=Paintings'>Paintings</a>"; ?>
						</li> 
						<li>
							<?php echo "<a href='forum.php?category_id=4&category=Literature'>Literature</a>"; ?>
						</li>
						<li>
							<?php echo "<a href='forum.php?category_id=6&category=Film & Animation'>Film & Animation</a>"; ?>
						</li>
						<li>
							<?php echo "<a href='forum.php?category_id=7&category=Fashion Designing'>Fashion Designing</a>"; ?>
						</li>
						<li>
							<?php echo "<a href='forum.php?category_id=8&category=Artisan Crafts'>Artisan Crafts</a>"; ?>
						</li>
						<li>
							<?php echo "<a href='forum.php?category_id=5&category=Foodylicious'>Foodylicious	</a>"; ?>
						</li>
				</div><!--left panel -->
				
				<div id="inner_content_area">
					<div class="line_block">
						<table id="topic_table">
							<tr>
								<th id="upvotes_head">Upvotes</th>
								<th id="topic_head">Topic</th>
								<th id="askedby_head">Asked By</th>
							</tr>
							
							<?php
								if((mysqli_num_rows($result))>=1){
									echo "<tr>";
									while($row = mysqli_fetch_array($result)) {
										echo "</tr> <tr>";
										echo "<td><a href='forum_topic.php?topic_id=".$row['topic_id']."'>".$row['upvotes']."</a></td>";
										echo "<td><a href='forum_topic.php?topic_id=".$row['topic_id']."'>".$row['topic_subject']."</a></td>";
										echo "<td><a href='forum_topic.php?topic_id=".$row['topic_id']."'>".$row['username']."</a></td>";
									}
									echo "</tr>";
								}
							?>
							
						</table>
						<?php if($category!="Forum") 
							echo '<div id="add_ques">
							<embed class="icon_dp" src="images/comment_smiley.gif"></embed>
							<form method="post" action="submit_quesProcess.php">
							<div id="text_area">
								<textarea type="text" cols="93" rows="5" id="ta" placeholder="Post a Question" name="question"></textarea>
							</div>
							<input value= "Submit Question" type="submit" name="submit_ques" id="submit_button"></input>
							</form>						
						</div>';
						?>
					<div class="clear"></div>
					
												
					</div><!--line block -->
				</div><!--inner content area -->
			</div><!--inner content -->
		</div><!--content -->
	</div><!--main -->
</div><!--div container close-->
</body>
</html>
