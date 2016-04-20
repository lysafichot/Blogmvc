<?php session_start();
include 'search/category.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content=""/>
	<link type= "text/css" rel="stylesheet" href="front/style.css" />
	<title>Life is strange</title>
	<script type="text/javascript" src="WISIWIG.js"></script>
</head>
<body>

	<?php include "include/header.php";?>
	<div id="body_article">
		<div class="all_container">
	<?php include "include/menu_panel.php"; ?>
			<div class="article_center">
				<h2>Create your article</h2>
				<form enctype="multipart/form-data" name="creer_article" method="POST" action="bdd/create_article_sql.php" class="sign">
					<div class="sign-outer">
						<div class="sign-inner">
							<label for="file">Picture : </label>
							<input id="file" type="file" name="datafile" accept="image/*">
						</div>
					</div>
					<div class="sign-outer">
						<div class="sign-inner">
							<label for="titre_article">Title : </label>
							<input type="text" name="titre_article" id="titre_article" placeholder="Your title"/>
						</div>
					</div>
				<div class="RTE">
					<div class="sign-outer">
						<div class="sign-inner">
							<label>Rich Text Editor : </label>
							<button id="gras" title="">Gras</button>
							<button id="italic" title="">Italique</button>
							<button id="sousligné" title="">Sousligné</button>
							<button id="image">Image</button>
							<button id="lien">Lien</button>
							<button id="youtube">Youtube</button>
						</div>
					</div>
				</div>
				<div class="article_create_body">
					<div class="sign-outer">
						<div class="sign-inner">
							<label for="content_article">Article : </label>
							<textarea type="text" name="content_article" id="content_article" placeholder="Write your article here "></textarea>
						</div>
					</div>
					<div class="sign-outer">
						<div class="sign-inner">
							<label for="tag">Tag : </label>
							<input type="text" name="tag" id="tag" placeholder="Tag">
						</div>
					</div>
				</div>
					<div class="sign-outer">
						<div class="sign-inner">
							<label for="category">Category : </label>
							<select id="category" name="category">
								<?php foreach ($liste_category as $values) { ?>
								<option <?php if(isset($_GET['category']) && $values['id_category'] == $_GET['category']) echo "selected"; ?> 
									value="<?php echo $values['id_category']; ?>">
									<?php echo $values['category']; ?>
								</option> <?php
							} ?>
						</select>
					</div>
				</div>
				<input type="submit" name="valid_article" class="valid" value="Post it">
				<input type="submit" name="PHP_preview" class="valid" value="Preview">
			</form>
			<div class="article_content"><div id="img"></div><div id="preview"></div></div>
		</div>
	</div>
</div>
<?php include "include/footer.php";?>
</body>
</html>