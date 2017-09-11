<?php
	include 'header.html';
	echo '<link rel= "stylesheet" href="css/tour.css">';
	//include any specific css file	
?>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#side').css("height",$('#content').height()) ;
			$('.product_details').css("width",$('.div_a').width()) ;
		});
	</script>
	</head>
	<?php
		include "header2.php";
		include "profileLoginHeader.php";
	?>


				<div id = "content">
					<p>Take a Tour of ARTESANIA</p>
					<div class="clear"></div>
					<div id="div_image">
						<img src="images/fella_what.png"></img>
						<object id="video" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="450" height="400" align="middle">
		<param name="wmode" value="transparent" />
		<param name="movie" value="http://www.deviantart.com/film/132909151/" />
		<param name="menu" value="true" />
		<param name="quality" value="high" />
		<param name="bgcolor" value="#000000" />
		<param name="allowFullScreen" value="true" />
		<embed src="http://www.deviantart.com/film/132909151/" quality="high" wmode="transparent" bgcolor="#000000" width="400" height="284" align="middle" allowFullScreen="true" menu="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
						</object>		
					</div>
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
			<div id="footer">
				<p>Artesania 2013 All Rights Reserved</p>
			</div>
		</div><!--div container close-->
	</body>
</html>
				
