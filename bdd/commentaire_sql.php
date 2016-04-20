<?php
session_start();
include('PDO.php');
if (isset($_POST['valid_com'])) {
	$postComment = htmlspecialchars($_POST['comment']);
	$postCommentTitle = htmlspecialchars($_POST['title_comment']);
	$insert_com = "INSERT INTO comment (id_member, id_article, title_comment, comment, date_comment) 
	VALUES (:id_member, :id_article, :title_comment, :comment, NOW())";
	$P_insert_com = $bdd->prepare($insert_com);
	$P_insert_com->bindParam(':id_member', $_SESSION['id_member']);
	$P_insert_com->bindParam(':id_article', $_POST['id_article']);
	$P_insert_com->bindParam(':comment', $postComment);
	$P_insert_com->bindParam(':title_comment', $postCommentTitle);
	$P_insert_com->execute();
	$P_insert_com->closeCursor();
	$commentNb = $bdd->prepare("SELECT count(id_article) FROM comment WHERE id_article = :id_article");
	$commentNb->bindParam(':id_article', $_POST['id_article']);
	$commentNb->execute();
	$commentNbr = $commentNb->fetch();
	$update_com = "UPDATE article SET nbr_comment = ".$commentNbr[0]." WHERE id_article = :id_article";
	$update = $bdd->prepare($update_com);
	$update->bindParam(':id_article', $_POST['id_article']);
	$update->execute();
	$update->closeCursor();
	header("location: ../".$_POST['from']);
}
?>