<header>
	<div id="header_top">
		<div id="menu_top">	
			<div id="log_menu">
				<?php 
				if($_SESSION) { 
					?>
					<h2><a href="log-sign/deconnexion.php" class="loginform" title="logout">Log out</a> | <a href="panel.php" class="loginform" title="panel">User panel </a></h2>
						<?php }
						
						else { ?>
						<h2><a href="log.php" class="loginform" title="login">Log in</a> | <a href="sign.php"title="register">Register</a></h2>
						<?php } ?>
					</div>
					<div class="searching">
						<form action="#" id="search" method="GET">
							<input id="search_tool" name="search" type="text" placeholder="Search" required/>
							<input id="search-btn" type="submit" value="Go" />
						</form>
					</div>
					<div id="social_menu">	
						<div id="header_link">
							<a href='http://facebook.com/' title="Facebook">Facebook</a>
							<a href='http://twitter.com/' title="Twitter">Twitter</a>
							<a href='http://instagram.com/' title="instagram">Instagram</a>
						</div>
					</div>
				</div>
			</div>
			<div id="logo">	
				<div id="slideshow">
					<div id="slide1">
						<img src="img/summer-wallpaper-9.jpg" alt= "slid">
					</div>
					<div id="slide2">
						<img src="img/background2.jpg" alt= "slid2">
					</div>
<!-- 					<div id="slide3">
						<img src="img/background3.jpg">
					</div>
					<div id="slide4">
						<img src="img/background4.jpg">
					</div>
					<div id="slide5">
						<img src="img/background5.jpg">
					</div>
					<div id="slide6">
						<img src="img/background6.jpg">
					</div>
					<div id="slide7">
						<img src="img/background7.jpg">
					</div>
					<div id="slide8">
						<img src="img/background8.jpg">
					</div>
					<div id="slide9">
						<img src="img/background9.jpg">
					</div> -->
				</div>
			</div>
			<script type="text/javascript" src="slide.js"></script>
			<div id="main_menu">
				<nav id="menu">
					<ul>
						<li><a href="index.php" title="Home">Home</a></li>
						<li class="all_category">
							<a href="display_category.php" title="Category">Category</a>
							<ul>
								<?php include 'bdd/display_category_sql.php';?> 
							</ul>
						</li>
						<li><a href="#" title="Tag">Tag</a></li>
						<li><a href="#" title="Archive">Archive</a></li>
						<li><a href="#" title="Contact">Contact</a></li>
					</ul>
				</nav>
			</div>
		</header>