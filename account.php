<?php 
require "function/articles.php";
include"bdd/PDO.php";
include "bdd/account_sql.php";
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
	<?php include "include/header.php"; ?>
	<div id="body_article">
		<div class="all_container">
			<?php include "include/menu_panel.php"; ?>
			<div id="body_account">
				<div class="user_component">

					<h2>Profil</h2>

					<form method="GET" name="profil" action="bdd/account_sql.php" class="sign">
						<div class="sign-outer">
							<div class="sign-inner">
								<label for="nom">Name : </label>
								<input type="text" id="name" name="name" value="<?php echo $infos['name']; ?>"/>
							</div>
						</div>
						<div class="sign-outer">
							<div class="sign-inner">
								<label for="prenom">First name : </label>
								<input type="text" id="first_name" name="first_name" value="<?php echo $infos['first_name']; ?>"/>
							</div>
						</div>
						<div class="sign-outer">
							<div class="sign-inner">
								<label for="email">Email : </label>
								<input type="text" id="email" name="email" value="<?php echo $infos['email']; ?>"/>
							</div>
						</div>
						<div class="sign-outer">
							<div class="sign-inner">
								<label for="adresse">Pseudo : </label>
								<input type="text" id="login" name="login" value="<?php echo $infos['login']; ?>"/>
							</div>
						</div>
						<input type="hidden" name="id" value="<?php echo $_SESSION['id_member']; ?>"/>
						<div class="sign-outer">
							<div class="sign-inner">
								<label for="comment">Comment : </label>
								<?php foreach($coms as $values) { 
									$idcom = $values['idcom'];?>
									<?php echo $values['title_comment']; ?>
									<?php echo $values['title']; ?>
									<?php echo $values['date_comment']; ?>
									<a href="index.php?id=<?php echo $values['idarticle']?>#<?php echo $idcom ?>" id="go_com" title="See comment">Go</a>
									<br/>
									<?php } ?>
									<input type="submit" id="modifier" name="modif_info" value="Modifier" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include "include/footer.php";?>
</body>
</html>