<?php
session_start();
include"PDO.php";
$sql = "SELECT * FROM user WHERE id_member = " .$_SESSION['id_member'];
$P_info = $bdd->prepare($sql);
$P_info->execute();
$infos = $P_info->fetch();


if(isset($_GET['modif_info'])) {


		$upinfos = "UPDATE user SET name='" . $_GET['name'] . "', first_name='" .$_GET['first_name']. "', 
						login='" .$_GET['login']. "', email='" .$_GET['email']. "' 
						WHERE id_member=" . $_SESSION['id_member'];
	$bdd->query($upinfos);
	header('Location: ../account.php');
}


$sql_com = "SELECT comment.title_comment, comment.id_comment AS idcom, comment.id_member AS id, comment.comment AS comment, comment.date_comment AS date_comment, 
					comment.id_article AS 'idarticle', article.id_article, article.title AS title FROM comment 
					LEFT JOIN article ON comment.id_article = article.id_article 
					WHERE comment.id_member=" . $_SESSION['id_member']." ORDER BY comment.id_article ASC";
					
$P_com = $bdd->prepare($sql_com);
$P_com->execute();
$coms = $P_com->fetchAll();



if(isset($_GET['modif_com'])) {

	$upcoms = "UPDATE comment SET comment='" . $_GET['mes_com'] . "' WHERE id_member=" . $_SESSION['id_member'];
	$bdd->query($upcoms);
	header('Location: ../account.php');
}

if(isset($_GET['sup_com'])) {

	$upcoms = "DELETE FROM comment WHERE id_member=" . $_SESSION['id_member'];
	$bdd->query($upcoms);
	header('Location: ../account.php');

}