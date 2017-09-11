<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/sign_in.css">';
echo '<link rel= "stylesheet" href="css/admin_profile.css">';
echo '<link rel= "stylesheet" href="css/forum.css">';
echo '<link rel= "stylesheet" href="css/admin_forum.css">';

echo '<style>
		#topic_table{
			
		}
	</style>';

echo "</head>";
include "header2.php";
?>
	<div id="content">
		<div id="query">
					<table id="topic_table">
						<tr id="aa">
							<td>QUESTION ID</td>
							<td>QUESTION</td>
							<td>POST TIME</td>
							<td>ASKED BY</td>
							<td>COMMENTS</td>
							<td>DELETE</td>
						</tr>
						<?php
							$con=mysqli_connect("localhost","root","","artesania");
							if(!$con){
								die("Connection error".mysqli_connect_error());
							}
							$query="select * from topics";
							$result=mysqli_query($con,$query);
							if((mysqli_num_rows($result))>=1){
								while($row=mysqli_fetch_array($result)){
										echo "<tr>";
										echo "<td><p>".$row['topic_id']."</p></td>";
										echo "<td><p>".$row['topic_subject']."</p></td>";
										echo "<td><p>".$row['topic_time']."</p></td>";
										echo "<td><p>".$row['username']."</p></td>";
										echo "<td><button value= 'view_comments' type='button' name='view_comments' onclick="."location.href='view_comments.php?topic_id=".$row['topic_id']."';".">View Comments</button></td>";
										echo "<td><button value= 'delete_question' type='button' name='delete_question' onclick="."location.href='delete_questionProcess.php?topic_id=".$row['topic_id']."';".">Delete</button></td>";
										echo "</tr>";
								}
							}
							else
								die("Some Problem occured in retrieving images from the database");
						?>
					</table>
		</div>
	</div>
	<div class="clear"></div>

<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>
