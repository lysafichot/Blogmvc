<?php include "bdd/account_sql.php";

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
			<?php include"include/menu_panel.php"; ?>
			<div class="user_component">
				<h2><?php echo "Welcome " .$infos['login']?></h2>
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>First name</th>
							<th>Login</th>
							<th>Email</th>
							<th>Date sign</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $infos['name']; ?></td>
							<td><?php echo $infos['first_name']; ?></td>
							<td><?php echo $infos['login']; ?></td>
							<td><?php echo $infos['email']; ?></td>
							<td><?php echo $infos['date_sign']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php include "include/footer.php";?>
</body>
</html>
