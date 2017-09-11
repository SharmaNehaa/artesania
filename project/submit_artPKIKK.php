<?php 
include 'header.html';
include_once("common.php");
//include any specific css file
echo '<link rel= "stylesheet" href="css/submit_art.css">
<script src="js/jquery-1.10.2.min.js"></script>
<script rel ="text/javascript" src="js/changeDropMenu.js" ></script>
<script rel ="text/javascript" src="js/uploadChangeFormElements.js" ></script>

';
echo "</head>";
include 'header2.php';
include 'profileLoginHeader.php';

?>





				<div id = "content">
					<!--<form id="uploadInfo" name="uploadInfo" action="upload_art.php" method="post" enctype="multipart/form-data">-->
						<div id="upload_area">
							<p class="para1">CREATE YOUR ART</p>
							<div id="area">	
								<?php
								if(isset($_GET['path'])) {
									$_FILES['file']['tmp_name']=$_GET['path'];
									$temp = explode(".", $_FILES["file"]["tmp_name"]);
									$num = (count($temp) - 1);
									$extension = end($temp);
									$_FILES['file']['name']=$temp[$num];
									$type="images/".$extension;
									echo '<form id="uploadInfo" name="uploadInfo" action="upload_artPix.php?tmp_name='.$_GET["path"].'&name='.$temp[$num].'&extension='.$extension.'&type='.$type.'" method="post" enctype="multipart/form-data">';
									echo 'action="upload_artPix.php?tmp_name='.$_GET["path"].'"&name="'.$temp[$num].'"&extension="'.$extension.'"&type="'.$type.'"';
								}
								else {
								
									
									echo '<form id="uploadInfo" name="uploadInfo" action="upload_art.php" method="post" enctype="multipart/form-data">';
									echo '<input type="file" name="file" id="file"></input><br>';
								}
								?>
							</div>
						</div>
						<input type="text" id="caption" placeholder="Caption" name="caption" ></input>
						<textarea type="text"  cols="40" rows="5" id="descrip" placeholder="Description" name="descrip"></textarea>
						<p class="para1">CHOOSE CATEGORY & SUB-CATEGORY</p>
						<div class="clear"></div>
						<select id="category" name="category" label="Category">
							<option value="default" selected="selected">Select Category</option>
							<option value="photography">Photography</option>
							<option value="painting">Painting</option>
							<option value="recipes">Recipes</option>
							<option value="film_animation">Film and Animation</option>
							<option value="literature">Literature</option>
							<option value="fashion">Fashion</option>
							<option value="craft">Artisan Craft</option>
						</select>	
						<select id="subcat" name="subcat" label="Sub-Category">
							<option value="defaultsub" selected="selected">Select SubCategory</option>
						</select>
						<br>
						<div class="clear"></div>
						<p class="para1" >On Sale</p>
						<div class="clear"></div>
						<div>
							<input class="radio" type="radio" id="yes_option" name="on_sale" value="yes">Yes</input>
							<input class="radio" type="radio" id="no_option" name="on_sale" value="no">No</input>
						</div>
						<div class="clear"></div><br>						
							<div style="display:none;" id="sale">
								<input type="text" name="price" placeholder="Price"></input><br>
								<input type="text" name="size" placeholder="Size"></input>
							</div>						
							<input type="submit" name="submitok" value="Upload">
						</form>										
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			
	<?php 
		include "footer.php";
	?>
		</div><!--div container close-->
		



	</body>
</html>

				
