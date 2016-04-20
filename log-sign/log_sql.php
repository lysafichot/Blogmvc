<?php
include("../bdd/PDO.php");

if(isset($_POST['valid_connexion'])) {
	if(isset($_POST['pseudo']) && isset($_POST['password'])) {
		
		$pseudo = $_POST['pseudo'];
		$pass = sha1('saltyicecream' . $_POST['password']);

		$session = "SELECT * FROM user WHERE login = '" . $pseudo . "' AND password = '" . $pass . "'";
		$P_session = $bdd->prepare($session);
		$P_session->execute();
		$liste_session = $P_session->fetch();
	}
	else {
		session_destroy();
		header('Location: ../log.php');
	}	
}

if(!$liste_session) { 
	header('Location: ../log.php?err=1'); 
	} 
	else {
		session_start();
		$_SESSION['id_member'] = $liste_session['id_member'];
		$_SESSION['login'] = $pseudo;
		$_SESSION['password'] = $pass;
		$_SESSION['admin'] = false;
		$_SESSION['auteur'] = false;
		$_SESSION['lecteur'] = false;

		if($liste_session['id_type'] == 2) {
			$_SESSION['admin'] = true;
		}
		elseif($liste_session['id_type'] == 1) {
			$_SESSION['auteur'] = true;
		}
		elseif($liste_session['id_type'] == 0) {
			$_SESSION['lecteur'] = true;
		}
		elseif($liste_session['id_type'] == 3) {
			session_destroy();
			header('Location: ../index.php?banni'); 
		}
}

if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
	$sql_i = "SELECT * FROM user WHERE login = '" . $_SESSION['login'] . "' AND password = '" . $_SESSION['password'] . "'";
	$query_info = $bdd->query($sql_i);
	while($info_session = $query_info->fetch()) {
		$_SESSION['id_member'] = $info_session['id_member'];
		$_SESSION['name'] = $info_session['name'];
		$_SESSION['first_name'] = $info_session['first_name'];
		$_SESSION['email'] = $info_session['email'];
	}

	$sql_t = "SELECT type.name AS 'type' FROM type LEFT JOIN user ON type.id_type = user.id_type WHERE user.id_member = " . $_SESSION['id_member'];
	$query_type = $bdd->query($sql_t);
	while($type_session = $query_type->fetch()) {
		$_SESSION['type'] = $type_session['type'];
	}
	if($_SESSION['lecteur']) { 
	header('Location: ../index.php');
	}
	elseif($_SESSION['auteur']) { 
	header('Location: ../index.php');
	}
	elseif($_SESSION['admin']) { 
		header('Location: ../index.php');
	}
}

?>