<?php 

include("bdd/SQL.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content=""/>
	<link type= "text/css" rel="stylesheet" href="front/style.css" />
	<link type= "text/css" rel="stylesheet" href="front/reset.css" />
	<title>My_weblog</title>
</head>
<body>
	<?php
	
		include("include/header.php");
	
	?>

	<div id = "liste_billet">
		<?php

		if ($liste_tag) {
			foreach ($liste_tag as $value) {
				?>

				<div class = "billet">
					<h2><?= $value['title']; ?></h2>
					<p><?= $value['chapo']; ?></p>
					<span><?= $value['date_publication']; ?></span>
				</div>
				<?php 
			}
		}
		else {
			echo '<p>Aucun billet ne correspond a ce tag !</p>';
		}
		?>
	</div>

</body>
</html>
