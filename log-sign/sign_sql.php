<?php
include "../bdd/PDO.php";

if(!empty($_POST)) {
	if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['first_name']) && !empty($_POST['first_name']) && isset($_POST['login']) && !empty($_POST['login']) 
		&& isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['password_confirm']) && !empty($_POST['password_confirm']) && isset($_POST['email']) 
		&& !empty($_POST['email'])) { 
		$verifPseudo = $bdd->prepare("SELECT * FROM user WHERE login= :pseudo");
	$verifPseudo->bindParam(':pseudo', $_POST['login']);
	$verifPseudo->execute(); 
	$liste_pseudo = $verifPseudo->fetch();

	if(!$liste_pseudo) {
		$verifEmail = $bdd->prepare("SELECT * FROM user WHERE email= :email");
		$verifEmail->bindParam(':email', $_POST['email']);
		$verifEmail->execute(); 
		$liste_email = $verifEmail->fetch();

		if(!$liste_email) {

			if($_POST['password'] == $_POST['password_confirm']) {

				$prenom = htmlspecialchars($_POST['first_name']);
				$nom = htmlspecialchars($_POST['name']);
				$login = htmlspecialchars($_POST['login']);
				$email = htmlspecialchars($_POST['email']);
				$password = htmlspecialchars($_POST['password']);
				$password_confirm = htmlspecialchars($_POST['password_confirm']);

				$pass_hache = sha1('saltyicecream' . $_POST['password']);

				$insert_user = $bdd->prepare('INSERT INTO user(id_type, first_name, name, login, email, password, date_sign) 
					VALUES(0, :first_name, :name, :login, :email, :password, NOW())');
				$insert_user->bindParam(':first_name', $prenom);
				$insert_user->bindParam(':name', $nom);
				$insert_user->bindParam(':login', $login);
				$insert_user->bindParam(':email', $email);
				$insert_user->bindParam(':password', $pass_hache);
				$insert_user->execute(); 
				$insert_user->closeCursor();

				header('Location: ../log.php');
	//Inscription reusite
			}
			else {
		// message les deux mot de passe ne correspondent pas.
				header('Location: ../sign.php');
			}
		}
		else {
			header('Location: ../sign.php?errmail');
		}
	}
	else {
		header('Location: ../sign.php?errlog');
	}
}
}
?>