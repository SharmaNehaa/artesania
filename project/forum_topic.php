<?php
	include 'header.html';	
?>  
	<link rel= "stylesheet" href="css/profile.css">
	<link rel= "stylesheet" href="css/forum.css">
	<link rel= "stylesheet" href="css/forum_topic.css">
	<script src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#left_panel').css("height",$('#inner_content_area').height()) ;
		});
	</script>
	
	<style>
		#question{
			margin-left:10px;
		}
		#question img{
			float:right;
			width:25px;
			height:25px;
			margin-right:20px;
		}
	</style>
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
						$category_id=$_GET['category_id'];
					}
					$con=mysqli_connect("localhost","root","","artesania");
					if(!$con){
						die("Connection error".mysqli_connect_error());
					}
					if(isset($_GET['topic_id'])) {
						$topic_id=$_GET['topic_id'];
						$query="select * from topics where topic_id=".$topic_id." ";
						$result=mysqli_query($con,$query);
						$row=mysqli_fetch_array($result);
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
							<?php echo "<a href='forum.php?category_id=1&category=Feedback and Queries'>Feedback and Queries</a>"; ?>
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
					<div id="question">
						<div id="ques_head">Topic:</div>
						<div id="ques_content"><?php echo "".$row['topic_subject']."" ?></div>
						<a href='question_upvote.php?topic_id=<?php echo $_GET['topic_id']; ?>'><img src='images/upvote.png'></img></a>
						<div class="clear"></div>
					</div>
					
					<?php
						$_SESSION['topic_id']=$_GET['topic_id'];
						$query2="select * from replies where topic_id='".$_GET['topic_id']."'";							
						$result2=mysqli_query($con,$query2);
						if((mysqli_num_rows($result2))>=1){
							while($row2 = mysqli_fetch_array($result2)) {
								$query3="select dp_name from user_details where username='".$row2['username']."'";
								$result3=mysqli_query($con,$query3);
								$row3 = mysqli_fetch_array($result3);
								$timestamp = strtotime($row2['reply_time']);
								$date = date('d-m-Y', $timestamp);
								echo "<div class='user_comment'>
										<embed class='icon_dp' src='".$row3['dp_name']."'></embed>
										<div class='text_dabba'>
											<div class='row1c1'>
												<a href='artist_profile.php?username=".$row2['username']."'><h1>".$row2['username']."</h1></a>
											</div>
											<div class='row1c2'>
												".$date."
											</div>
											<br></br>
											<div class='row2c1'>
												".$row2['reply_content']."
											</div>
										</div>
									</div>";						
							}
						}						
					?>
					
					<div class="clear"></div>
					<div id="add_reply">
						<embed class='icon_dp' src="images/comment_smiley.gif"></embed>
						<form method="post" action="submit_replyProcess.php">
						<div id="text_area">
							<textarea type="text" cols="93" rows="5" id="ta" placeholder="Post a Reply" name="reply"></textarea>
						</div>
						<input value= "Submit Reply" type="submit" name="submit_reply" id="submit_button"></input>
						</form>						
					</div>
				
				</div><!--inner content area -->
			</div><!--inner content -->
		</div><!--content -->
	</div><!--main -->
</div><!--div container close-->
</body>
</html>
