<?php
include 'header.html';

//include any specific css file
echo '<link rel= "stylesheet" href="css/button.css">';
echo '<link rel= "stylesheet" href="css/registered.css">';
echo "</head>";
include "header2.php";
include "profileLoginHeader.php";
?>


				<div id = "content">
					<p class="para1">Welcome to the world of Artesania !</p>
					<div id="option">
					<a href="profile.php" id="leaf"><img src='images/fella1.gif'></img></a>
					<a href="home.php" id="leaf"><img src='images/fella2.png'></img></a>
					<a href="paint.php" id="leaf"><img src='images/fella_help_paint.png'></img></a>
					<a href="tour.php" id="leaf"><img src='images/fella_tour.png'></img></a>
					</div>
					<div class="clear"></div>
					<div id="button_area">
						<button class="btn_view" id="b1" onclick="location.href='profile.php'">View Profile</button>
						<button class="btn_view" id="b2" onclick="location.href='home.php'">Explore More</button>
						<button class="btn_view" id="b3" onclick="location.href='paint.php'">Help Us Paint A Better Picture of You!</button>
						<button class="btn_view" id="b4" onclick="location.href='tour.php'">Take a Tour</button>
					</div>
				</div><!--div content close-->
				<div class="clear"></div>
			</div><!--div main close-->
	<?php 
		include "footer.php";
	?>
		</div><!--div container close-->
	</body>
</html>
