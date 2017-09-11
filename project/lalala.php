<?php
						$_SESSION['category_id']=$_GET['category_id'];
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
												<a href='artist_profile.php?username=".$row2['username']."'><h1>".$row2['username']."</h1>
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
