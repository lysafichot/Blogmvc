<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content=""/>
	<link type= "text/css" rel="stylesheet" href="front/style.css" />
	<script type="text/javascript" src="verif.js"></script>
	<title>Life is strange</title>
</head>
<body>
	<?php include "include/header.php";?>

	<div id="body_article">
		<div class="all_container">
			<div class="article_center">
				<h2>We waiting for you</h2>
				<form action="log-sign/log_sql.php" method="post" class="sign" id= "log">
					<div class="sign-outer">
						<div class="sign-inner">
							<label for="login">Login :</label>
							<input type="text" name="pseudo" id="pseudo" size="30" maxlength="20" required/>
						</div>
					</div>
					<div class="sign-outer">
						<div class="sign-inner">
							<label for="pass">Password :</label>
							<input type="password" name="password" id="password" required/><br/>
						</div>
						<?php if (isset($_GET['err'])): ?>
							<div id= "error_log">
								<p>Error, your login or your password is wrong ! Please try again.</p>
							</div>
						<?php endif; ?>
					</div>
					<input type="submit" name="valid_connexion" class="sign_log" value="Log me !"/>
					<p>Not registered ? <a href="sign.php" title="sign up">Joined up here !</a></p>
				</form>
			</div>
		</div>
	</div>
<?php include "include/footer.php";?>
</body>
</html>
		<!-- onmouseover="document.getElementById('form_log').style.visibility='visible';" onmouseout="document.getElementById('form_log').style.visibility='hidden';" -->