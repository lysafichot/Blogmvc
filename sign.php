<?php session_start(); ?>
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
	<?php include "include/header.php"; ?> 

	<div id="body_article">
		<div class="all_container">
			<div class="article_center">
				<section class="form_sign">
					<h3>Sign up</h3>
					<?php if(isset($_GET['errlog'])) { ?>
					<div><p>Sorry ! This pseudo you have entered is already registered</p></div>
						<?php }
						elseif(isset($_GET['errmail'])) { ?>
					<div><p>Sorry ! The email address you have entered is already registered</p></div>
						<?php } ?>
					<form class="sign" id="sign" method="POST" action="log-sign/sign_sql.php">		
						<div class="sign-outer">
							<div class="sign-inner">
								<label>First Name</label>
								<input type="text" name="first_name" id="first_name" class="auth" placeholder="First name" required>
							</div>
						</div>
						<div class="sign-outer">
							<div class="sign-inner">
								<label>Name</label>
								<input type="text" name="name" id="name" class="auth" placeholder="Name" required>
							</div>
						</div>	
						<div class="sign-outer">
							<div class="sign-inner">
								<label>Login</label>
								<input type="text" name="login" class="auth" id="login" placeholder="Login" required>
							</div>
						</div>
						<div class="sign-outer">
							<div class="sign-inner">
								<label>Email</label>
								<input type="email" name="email" id="email" class="auth" placeholder="Email@email.com" required>
							</div>
						</div>
						<div class="sign-outer">
							<div class="sign-inner">
								<label>Password</label>
								<input type="password" name="password" class="auth" id="password"  required>
							</div>
						</div>
						<div class="sign-outer">
							<div class="sign-inner">
								<label>Confirm password</label>
								<input type="password" name="password_confirm" class="auth" id="password_confirm" required>
							</div>
							<div id= "error_pass"></div>
						</div>
						<input id="verif" type="submit" class="valid" value="Sign up ?">
					</form>
				</section>
			</div>
		</div>
	</div>
<?php include "include/footer.php";?>
</body>
</html>
		<!-- onmouseover="document.getElementById('form_log').style.visibility='visible';" onmouseout="document.getElementById('form_log').style.visibility='hidden';" -->