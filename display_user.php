<?php session_start(); ?>
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
	<?php include "include/menu_panel.php"; ?>
	<div class="user_component">
		<h2>All user</h2>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>First name</th>
					<th>Login</th>
					<th>Type</th>
					<th>Email</th>
					<th>Date sign</th>
				</tr>
			</thead>
			<?php include"bdd/display_user_sql.php"; ?>
				<?php foreach($data as $value) { ?>
			<tbody>
				<tr>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['first_name']; ?></td>
				<td><?php echo $value['login']; ?></td>
				<td>
					<form method="GET" name="type" action="bdd/display_user_sql.php" >
						<input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
						<select id="type" name="id_type">
							<?php 	foreach($liste_type as $key) { ?>	
							<?php if($key['id_type'] != $value['id_type']) { ?>
							<option value="<?php echo $key['id_type']; ?>"><?php echo $key['name']; ?></option>
							<?php } else { ?>
							<option value="<?php echo $key['id_type']; ?>" selected><?php echo $key['name']; ?></option>
							<?php }} ?>
						</select>
						<input type="submit" id="validation" name="validation" value="Modifier" />
					</form>
				</td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['date_sign']; ?></td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	</div>
	</div>
	</div>
	<?php include "include/footer.php";?>
</body>
</html>