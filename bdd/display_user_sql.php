<?php
include 'PDO.php';
$query_typ = $bdd->query("SELECT id_type, name FROM type");
$liste_type = $query_typ->fetchAll();


$sql = 'SELECT type.id_type, type.name AS type, user.id_member AS id, user.id_type AS id_type, user.first_name AS first_name, user.name AS name, user.login AS login, 
				user.email AS email, user.password, user.date_sign AS date_sign FROM user LEFT JOIN type ON user.id_type = type.id_type';
	$user = $bdd->prepare($sql);
	$user->execute();
	$data = $user->fetchAll();
		

if(isset($_GET['validation'])) {
	
		$uptype = "UPDATE user SET id_type='" . $_GET['id_type'] . "' WHERE user.id_member=" . $_GET['id'];
	$bdd->query($uptype);	
	header('Location: ../display_user.php');
}


		
?>