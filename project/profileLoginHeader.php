<?php		
		
		
		if (isset($_SESSION['username'])){
			echo '<div id="user_menu">
				<ul >
					<li>
						<a href="#">Artista ~				
							
								'.$_SESSION['username'].'
							
						</a>
					</li>
					 <li >
						<img src="images/profile_icon.png"></img>
						<a href="profile.php">Profile</a>
					</li>
					<li>
						<img src="images/gallery_icon.png"></img>
						<a href="gallery.php?username='.$_SESSION['username'].'">Gallery</a>
					</li>
					<li>
						<img src="images/fav.png"></img>
						<a href="favourite.php">Favourites</a>
					</li>
					<li>
						<img src="images/shop_icon.png"></img>
						<a href="shop.php">Shop</a>
					</li>
					<li>
						<img src="images/submit_icon.png"></img>
						<a href="submit_art.php">Submit</a>
					</li>
					<li>
						<img src="images/settings.png"></img>
						<a href="paint.php">Edit Profile</a>
					</li>
					<li>
						<img src="images/logout.png"></img>
						<a href="logout.php">Log Out</a>
					</li>
				
				</ul>
			</div>
			<div id = "main">';
			}
			else
			echo
			'
			<div id ="main">';