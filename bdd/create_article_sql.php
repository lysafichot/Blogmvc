<?php session_start();
include("PDO.php");

if(isset($_SESSION['login']) && isset($_SESSION['password']) && ($_SESSION['admin'] === true || $_SESSION['auteur'] === true )) {	
	if(isset($_POST['valid_article'])  && !empty($_POST['titre_article']) 
		&& !empty($_POST['content_article']) && !empty($_POST['tag'])) {

		$content_article = $_POST['content_article']; 
			//BBCode
	$editer = "INSERT INTO article (id_category, id_member, title, article, date_create, date_modif, date_public, tag_assign, picture) VALUES (:category, :member, :title, :article, NOW(), NOW(), NOW(), :tag, :image)";
	$P_create = $bdd->prepare($editer);
	$P_create->bindParam(':category', $_POST['category']);
	$P_create->bindParam(':member', $_SESSION['id_member']);
	$P_create->bindParam(':title', $_POST['titre_article']);
	$P_create->bindParam(':article', $content_article);
	$P_create->bindParam(':tag', $_POST['tag']);
	$P_create->bindParam(':image', $_FILES['datafile']['name']);
	$P_create->execute();
	$P_create->closeCursor();

	$uploaddir = '/var/www/html/PROJET/Projet_Web_my_weblog/img/article/';
	$uploadfile = basename($_FILES['datafile']['name']);
	$taille_maxi = 5000000;
	$taille = filesize($_FILES['datafile']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['datafile']['name'], '.'); 
	
	if(!in_array($extension, $extensions))
	{
		$erreur = 'You must upload a type of picture with png, gif, jpg, jpeg, please.';
	}
	if($taille>$taille_maxi)
	{
		$erreur = 'You picture is too oversized';
	}
	if(!isset($erreur))
	{
		$uploadfile = strtr($uploadfile, 
			'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		if (move_uploaded_file($_FILES['datafile']['tmp_name'], $uploaddir.$uploadfile)) 
		{
			echo "File is valid, and was successfully uploaded.\n";
		}
		else
		{
			echo "Upload failed";
		}
	}
	else
	{
		echo $erreur;
	}
	?>
	<script type="text/javascript">
		window.setTimeout("location=('../index.php');", 0);
	</script>
	<?php
}
else { ?>
<script type="text/javascript">
	window.setTimeout("location=('../create_article.php');", 0);
</script>
<?php		
}
} else {
	header('Location: ../index.php');
	exit();
}
?>