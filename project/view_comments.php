<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/sign_in.css">';
echo '<link rel= "stylesheet" href="css/admin_profile.css">';
echo '<link rel= "stylesheet" href="css/forum.css">';
echo '<link rel= "stylesheet" href="css/admin_forum.css">
	<style>
		#text_area{
			margin-left:0px;
			margin-top:3px;
		}
		#submit_button{
			margin-right:400px;
			height:40px;
			width:150px;
		}
	</style>
	';

echo "</head>";
include "header2.php";
?>
	<div id="content">
		<?php
			$con=mysqli_connect("localhost","root","","artesania");
			if(!$con){
				die("Connection error".mysqli_connect_error());
			}
			$query="select * from replies where topic_id=".$_GET['topic_id']."";
			$result=mysqli_query($con,$query);
			
			if((mysqli_num_rows($result))>=1){
				echo "<table id='topic_table'>";

				echo "<tr id='aa'><td><p>USER</p></td>";
				echo "<td><p>COMMENT</p></td>";
				echo "<td><p>TIME</p></td>";
				echo "<td><p>DELETE</p></td></tr>";
				while($row=mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td><p>".$row['username']."</p></td>";
						echo "<td><p>".$row['reply_content']."</p></td>";
						echo "<td><p>".$row['reply_time']."</p></td>";
						echo "<td><button value= 'delete_comment' type='button' name='delete_comments' onclick="."location.href='delete_comment.php?reply_id=".$row['reply_id']."&topic_id=".$_GET['topic_id']."';".">Delete</button></td>";
						echo "</tr>";
				}
				echo "</table>";

			}
			else
				echo "No replies to this question.";
		?>
						<div id='add_comment'>
						<form method='POST' action='admin_commentProcess.php?topic_id= <?php echo $_GET['topic_id']; ?>'>
							<div id='text_area'>
							<textarea type='text' cols='93' rows='5' id='ta' placeholder='Add a comment as Admin' name='desc'></textarea>
							</div>
						<input value= 'Submit Comment' type='submit' name='submit_comment' id='submit_button'></input>
						</form>

					</div>

	</div>
	<div class="clear"></div>

<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>
