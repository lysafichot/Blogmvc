<?php session_start(); 
require "function/articles.php";
require "function/side.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content=""/>
	<link type= "text/css" rel="stylesheet" href="front/style.css" />
	<title>Life is strange</title>
</head>
<body>
	<?php include "include/header.php";?>

	<div id="body_article">
		<div class="all_container">
			<?php if (isset($_GET['banni'])): ?>
							<div id= "banni">
								<p>You have been banished from our blog !</p>
							</div>
						<?php endif; ?>
			<div class="article_center">
				<?php article("index.php"); ?>
			</div>
			<?php side(); ?>
		</div>
	</div>
	<?php include "include/footer.php";?>
</body>
</html>
		<!-- onmouseover="document.getElementById('form_log').style.visibility='visible';" onmouseout="document.getElementById('form_log').style.visibility='hidden';" -->