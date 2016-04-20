<div id='menu_side_panel'>
<ul>
	<?php
	if($_SESSION['lecteur'] == true) { ?>
	<li><a href="panel.php" class="loginform" title="Home">Home</a></li>
	<li><a href="account.php" class="loginform" title="Edit profile">Edit profile</a></li>
	<?php } 
	elseif($_SESSION['auteur'] == true) { ?>
	<li><a href="panel.php" class="loginform" title="Home">Home</a></li>
	<li><a href="account.php" class="loginform" title="Edit profile">Edit profile</a></li>
	<li><a href="create_article.php" class="loginform" title="My account">Write an article</a></li>

	<?php } elseif ($_SESSION['admin'] == true) { ?>
	<li><a href="panel.php" class="loginform" title="Home">Home</a></li>
	<li><a href="account.php" class="loginform" title="Edit profile">Edit profile</a></li>
	<li><a href="create_article.php" class="loginform" title="Write an article">Write an article</a></li>
	<li><a href="display_user.php" class="loginform" title="List of members">List of members</a></li>
	<?php } ?>
</ul>
</div>