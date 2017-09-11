<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/primary.css">';
echo '<link rel= "stylesheet" href="css/reported_images.css">';
echo '<link rel= "stylesheet" href="css/contentAlign.css">';

echo "</head>";
include "header2.php";
?>
	<div id="content">
	
			<?php
				$con=mysqli_connect("localhost","root","","artesania");
				if(!$con){
					die("Connection error".mysqli_connect_error());
				}
				$count=0;
				$query="select * from reported_images";
				$result=mysqli_query($con,$query);
				if((mysqli_num_rows($result))>=1){
					echo "	<table id='table_report'>";
					while($row = mysqli_fetch_array($result)) {
						echo "<tr id='id".($count%2)."'>";
						echo "<td><a href='product_profile.php?path=".$row['path']."'><embed src='".$row['path']."'></embed></a></td>";
						echo "<td><a href='delete_image.php?path=".$row['path']."'>DELETE</a></td>";
						echo "<td><a href='ignore_image.php?path=".$row['path']."'>IGNORE</a></td>";
						echo "<div class='clear'></div>";
						echo "</tr>";
						$count++;
					}
					echo "</table>";
				}
				else
				echo "<p id='no_img'>No reported images!</p>";
				mysqli_close($con);
			?>
		
	</div>
	<div class="clear"></div>
<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>
