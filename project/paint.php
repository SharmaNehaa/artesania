<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/product_profile.css">';	
echo '<link rel= "stylesheet" href="css/profile_pic.css">';
echo '<link rel= "stylesheet" href="css/box.css">';	
echo '<link rel= "stylesheet" href="css/paint.css">
<style>
	
	
</style>';

echo '<script src="js/jquery-1.10.2.min.js"></script>';
echo '<script rel ="text/javascript" src="js/register.js" ></script>';

echo "</head>";
?>

<body>
	<?php


		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}

		include "header2.php";
		include "profileLoginHeader.php";
		
		$query1="select * from user_details where username='".$_SESSION['username']."'";
		$result=mysqli_query($con,$query1);
		$row = mysqli_fetch_array($result);
		if(!mysqli_query($con,$query1)){
			die("Error: Problem in retrieving details of user from database");
		}
		$query1="select * from interests where username='".$_SESSION['username']."'";
		$result=mysqli_query($con,$query1);
		$row2 = mysqli_fetch_array($result);
		if(!mysqli_query($con,$query1)){
			die("Error: Problem in retrieving details of user from database");
		}
		
		
		
		if(!($row['name']=="" || $row['contact']=="" || $row['address']=="" || $row['bank_acc_no']=="" || $row['bank_name']=="")) {
			
			if($row['gender']=="male" || $row['gender']=="Male")
				$image1="images/male1.jpg";
			else
				$image1="images/female1.jpg";
		}
		else {
			if($row['gender']=="male" || $row['gender']=="Male")
				$image1="images/male1grey.jpg";
			else
				$image1="images/female1grey.jpg";
		}
		if(isset($row2['artist']) && isset($row2['movie']) && isset($row2['band_music']) && isset($row2['writer']) && isset($row2['cuisine']) && isset($row2['fashion_brand'])  && isset($row2['category'])) {
			if($row['gender']=="male" || $row['gender']=="Male")
				$image2="images/male2.jpg";
			else
				$image2="images/female2.jpg";
		}
		else {
			if($row['gender']=="male" || $row['gender']=="Male")
				$image2="images/male2grey.jpg";
			else
				$image2="images/female2grey.jpg";
		}
		if(isset($row['dp_name']) && $row['dp_name']!="images/default.jpg") {
			if($row['gender']=="male" || $row['gender']=="Male")
				$image3="images/male3.jpg";
			else
				$image3="images/female3.jpg";
		}
		else {
			if($row['gender']=="male" || $row['gender']=="Male")
				$image3="images/male3grey.jpg";
			else
				$image3="images/female3grey.jpg";
		}
	?>			
	<div id = "content">
		<div class="box" id="paintForm">
			<h3 align="center" id="heading">Help Us Paint A Better Picture Of You!</h3>
			<hr align="center" width:"100%">
			<form action="paintProcess.php" method="post" id="paintForm">
				<div class = "frame">
					<div class = "picture_areas" id="area1">									
						<?php echo "<img src='".$image1."'></img>" ?>
					</div>
					<div class = "picture_areas" id="area2">
						<?php echo "<img src='".$image2."'></img>" ?>
					</div>
					<div class = "picture_areas" id="area3">	
						<?php echo "<img src='".$image3."'></img>" ?>						
					</div>
					
				</div><!--frame div -->
			</form>
		</div><!--paint div -->
		<div class="box" id = "aboutForm" style="display:none">
					<h3 align="center">ABOUT YOU</h3>
					<hr>
					<form action="aboutProcess.php" method="post" id="orange">
			
					<table align="center" id="table">
						<tr>
							<td><input type="text" name="name" placeholder="Your Name"></input></td>
						</tr>
						<tr>
							<td><input type="text" name="contact" placeholder="Contact"></input></td>
						</tr>
						<tr>
							<td><input type="text" name="address" placeholder="Residential Address"></input></td>
						</tr>
						<tr>
							<td><input type="text" name="bank_name" placeholder="Bank Name"></input></td>
						</tr>
						<tr>
							<td><input type="number" name="bank_acc_no" placeholder="Bank Account Number"></input></td>
						</tr>
						<tr>
							<td><input type="button" value="Back" class="button" onclick="location.href='paint.php';"></input></td>
							<td><input type="submit" value="Continue" class="button" ></input></td>						
						</tr>

					</table>
					</form>
		</div>	<!--about div-->
		<div class="box" id="interestForm" style="display:none">
			<h3 align="center">INTERESTS</h3>
			<hr align="center" >
			<div id="orange">
			<form action="interestProcess.php" method="post" id="interestsForm">
			<table align="center" id="table">
				<tr>
					<td><label>Favourite visual artist</label>
					<td><input type="text" name="artist"></input></td>
				</tr>
				<tr>
					<td><label>Favourite movies</label>
					<td><input type="text" name="movie"></input></td>
				</tr>
				<tr>
					<td><label>Favourite bands/musical artists</label>
					<td><input type="text" name="band_music" ></input></td>
				</tr>
				<tr>
					<td><label>Favourite books</label>
					<td><input type="text" name="book"></input></td>
				</tr>
				<tr>
					<td><label>Favourite writers</label>
					<td><input type="text" name="writer" ></input></td>
				</tr>
				<tr>
					<td><label>Favourite cuisine</label>
					<td><input type="text" name="cuisine" ></input></td>
				</tr>
				<tr>
					<td><label>Favourite designer brands</label>
					<td><input type="text" name="fashion_brand" ></input></td>
				</tr>
				<tr>
					<td><label>Favourite fashion designers</label>
					<td><input type="text" name="fashion_designer" ></input></td>
				</tr>
				<tr>
					<td><label>Favourite paint</label>
					<td><input type="text" name="painter" ></input></td>
				</tr>
				<tr>
					<td><label>Favourite category</label>
					<td><input type="text" name="category" ></input></td>
				</tr>
				<tr>
					<td><label>Favourite subcategory</label>
					<td><input type="text" name="subcategory" ></input></td>
				</tr>									
				<tr>
					<td><input type="button" value="Back" class="button" onclick="location.href='paint.php';"></input></td>
					<td><input type="submit" value="SUBMIT" class="button" ></input></td>
				</tr>

			</table>
			</form>
			</div>
		</div><!--interest div -->
     <div id = "profileForm" class="box" style="display:none">
			<h3 align="center" id="heading">CHOOSE A UNIQUE AVATAR FOR YOU!</h3>
			<hr>
		<div id="orange">
			<div align="center" id="current_avatar">
				<?php 
				
				$query="select dp_name from user_details where username='".$_SESSION['username']."'";
				$result=mysqli_query($con,$query);
				if((mysqli_num_rows($result))==1){
					$row = mysqli_fetch_array($result);
					$src=$row['dp_name'];
					echo "<img src = '".$src."' id='current_img'></img>";
					
				}
				else
				die("Registration failed.Try again");

				mysqli_close($con); ?>
			</div>
				<p class="para1">Choose your favourite avatar</p>
				<form action="setAvatar.php" method="post">
				<table id="avatar">
			          <tr>
					<td width=180px><img src="images/default_avatar_blue.png"></img></td>	    
						<td width=180px><img src="images/default_avatar_pink.png"></img></td>
						<td width=180px><img src="images/default_avatar_green.png"></img></td>
					  </tr>
							
			          <tr>
					<td width=220px><input type="radio" name="avatar" value="default_avatar_blue.png"></td>	    
						<td width=220px><input type="radio" name="avatar" value="default_avatar_pink.png"></td></br>
						<td width=220px><input type="radio" name="avatar" value="default_avatar_green.png"></td>
					  </tr>
				  <tr>
					<td><input type="submit" value="Select"></td>
				  </tr>
				</table>
				</form>
				<p class="para1">An avatar image file should be a maximum 50x50px PNG, JPEG or GIF image that is smaller than 15 KB</p>
				<div class="clear"></div>
			<form action="upload_file.php" method="post" enctype="multipart/form-data" id="file_form">
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file"><br>
				<td><input type="button" value="Back" class="button" onclick="location.href='paint.php';"></input></td>
				<td><input type="submit" name="submit" value="Upload Image"></td>
			</form>
		</div>

	</div><!--profile pic div-->
						
	</div><!--content div -->
	<div class="clear"></div>
	</div><!--div main close-->
<?php
	include 'footer.php';
?>
</div><!--div container close-->
</body>
</html>
		
