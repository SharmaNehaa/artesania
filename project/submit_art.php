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
if(isset($_GET['username']) && isset($_GET['path'])){
	$action="upload_art.php?title=".$_GET['title']."&username=".$_GET['username']."&path=".$_GET['path']."";
}
else 
	$action="upload_art.php";
?>





				<div id = "content">
					<?php echo '<form id="uploadInfo" name="uploadInfo" action='.$action.' method="post" enctype="multipart/form-data">'
					?>
					<div id="upload_area">
						<p class="para1">CREATE YOUR ART</p>
						<div id="area">							
							<input type="file" name="file" id="file"><br>
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
							<input type="text" id="price" name="price" placeholder="Price"></input><br>
							<input type="text" id="size" name="size" placeholder="Size"></input>
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

				
