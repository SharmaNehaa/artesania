<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/product_profile.css">';
echo '<link rel= "stylesheet" href="css/recommended_by.css">';
echo '<style>
		#pg{
			font-size:20px;
			color:#808080;
			text-align:center;
		}
	</style>';
echo "</head>";
include "header2.php";
include "profileLoginHeader.php";
?>
	<div id="content">
	<?php
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("connection error");
		}	
		$query="select * from recommendations where artist='".$_GET['username']."'";
		$result=mysqli_query($con,$query);
		if((mysqli_num_rows($result))>=1){
			echo "<table id='rc'>";
			while($row = mysqli_fetch_array($result)) {
			
				echo "<tr>";
				$query1="select dp_name from user_details where username='".$row['username']."'";
				$result1=mysqli_query($con,$query1);
				$row1 = mysqli_fetch_array($result1);
				$query2="select category from interests where username='".$row['username']."'";
				$result2=mysqli_query($con,$query2);
				$row2 = mysqli_fetch_array($result2);
				echo "<td><embed src='".$row1['dp_name']."'></embed></td>
				<td><a href='artist_profile.php?username=".$row['username']."'>".$row['username']."</a></td>
				<td>".$row2['category']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else
			echo "<p id='pg'>No one yet recommends ".$_GET['username']."</p>";
		
	?>

	</div>
	<div class="clear"></div>
</div> <!--close main-->
<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>