<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/product_profile.css">';
?>
<style>
	#content embed {
		padding-bottom:5px;
	}
	#content {
		display:inline;
	}
	.image_box {
		float:left;
	}
	.image_p {
		margin-top:0px;
		margin-left:10px;
		font-size:15px;
		max-width:199px;
	}
	#sorry {
		font-size:20px;
		font-family:Comic Sans;
		text-align:center;
	}
</style>
<?php
echo "</head>";
include "header2.php";
include "profileLoginHeader.php";
?>
	<div id="content">
<?php
	$con=mysqli_connect("localhost","root","","artesania");
	if(!$con){
		die("Connection error".mysqli_connect_error());
	}		
	$query;					
	if(isset($_POST['search'])) {
		//echo $_POST['search'];
		$query="select * from products where caption like '%".$_POST['search']."%' or description like '%".$_POST['search']."%' LIMIT 12";
		$result=mysqli_query($con,$query);
		//echo $query;
	}
	else {
		//echo $_POST['search'];
		header('Loacation:home.php');
		$result=0;
	}
	
	if($result){
		while($row = mysqli_fetch_array($result)) {
			
			echo "<div class='image_box'>
					<a href='product_profile.php?path=".$row['path']."'><embed src='".$row['path']."'></embed></a>
					<p class='image_p'>".$row['caption']."</p>
				</div>	
			
				";
		}
	
	}		
	else{
		echo "<p id='sorry'>Sorry! No item matches your search</p>";
	}			

?>
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
