<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/admin_profile.css">';
echo '<link rel= "stylesheet" href="css/contentAlign.css">';
echo "</head>";
include "header2.php";
?>
	<div id="content">
		<h3 align="center">ADMIN PANEL</h3>
		<hr>
		<table align="center" id="orange" height="300px">
			<tr>
				<td><a href="reported_images.php">VIEW REPORTED IMAGES</a></td>
			</tr>
			<tr>
				<td><a href="all_uploads.php">VIEW ALL UPLOADS</a></td>
			</tr>
			
			<tr>
				<td><a href="all_users.php">VIEW ALL USERS</a></td>
			</tr>
			<tr>
				<td><a href="transactions.php">VIEW ALL TRANSCATIONS</a></td>
			</tr>
			<tr>
				<td><a href="admin_queries.php">ANSWER QUERIES AND FEEDBACK</a></td>
			</tr>

		</table>
	
	</div>
	<div class="clear"></div>


<div class="clear"></div>
<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>
