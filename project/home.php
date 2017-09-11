<?php
	include 'header.html';
	//include any specific css file	
?>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		 $( window ).load(function() {
		 	alert( $("#content").height());
			//$("#side").css({'height':($("#content").height()+'px')});
			//document.getElementById("side").style.minheight = document.getElementById("content").style.height;
			//$('#side').css("height",$('#main').height()) ;
			$('.product_details').css("width",$('.div_a').width()) ;
		});
		.bind('resize', function(){
		var outer_width = parseInt($('.embed_div').width() + 4);
         $('.image_box').width(outer_width);
		});
	</script>
	<style>
		/*#content {
			padding-left:200px;
		}
		#side {
			postion:fixed;
		}*/
	</style>
	</head>
	<?php
		include "header2.php";
		include "profileLoginHeader.php";
		include "sidebar.html";
	?>

		<div id = "content">
			
				<?php
					$con=mysqli_connect("localhost","root","","artesania");
					if(!$con){
						die("Connection error".mysqli_connect_error());
					}							
					if(!isset($_GET['category'])) {
						$query="select * from products order by upload_time DESC LIMIT 12";
					}
					else {
						$query="select * from products where category='".$_GET['category']."' order by upload_time DESC LIMIT 12";
					}
					$result=mysqli_query($con,$query);
					$count=1;
					if((mysqli_num_rows($result))>=1){
						while($row = mysqli_fetch_array($result)) {
								$query1="select count(comment) from comments where product_id=".$row['product_id'];
								$result1=mysqli_query($con,$query1);
								$row1 = mysqli_fetch_array($result1);
							echo "
								<div class='image_box'>
									<div class='div_a'>
										<a href='product_profile.php?path=".$row['path']."'><embed src='".$row['path']."' class='embed_div'></embed></a>
									</div>
									<div class='product_details'>
										<div class ='product_artist'>
											<img src='images/fav_art.gif'></img><a href='artist_profile.php?username=".$row['username']."'>".$row['username']."</a>
										</div>
										<div class ='product_upvotes'>
											<a href='increment_upvotes.php?path=".$row['path']."&caller_page=home.php'><img src='images/upvote.png'></img></a>".$row['upvotes']."
										</div>
										<div class ='product_comments'>
											<img src='images/Messages_icon.png'></img>".$row1['count(comment)']."
										</div>
										<div class='clear'></div>
									</div>
								</div>
								
								";
					
						}
					
					}					
					mysqli_close($con);
				?>
		
		</div>
		<div class="clear"></div>
	</div><!--div main close-->
	 <div class="push"></div>
	<?php 
		include "footer.php";
	?>
		</div><!--div container close-->
	</body>
</html>
				
