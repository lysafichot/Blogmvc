<?php
include("bdd/PDO.php");
$commentaire = "SELECT comment.id_comment AS id_com, comment.title_comment, comment.comment, comment.date_comment, comment.id_article, article.id_article, comment.id_member, user.login, user.id_member, comment.id_comment
FROM comment LEFT JOIN article 
ON comment.id_article = article.id_article 
LEFT JOIN user ON comment.id_member = user.id_member
WHERE comment.id_article = " . $_GET['id'];
$P_commentaire = $bdd->prepare($commentaire);
$P_commentaire->execute();
$liste_commentaire = $P_commentaire->fetchAll();
$commentNb = $bdd->prepare("SELECT count(id_article) FROM comment WHERE id_article = ".$_GET['id']);
$commentNb->execute();
$commentNbr = $commentNb->fetch();
if ($commentNbr[0] == 0) {
	$commentA = "No comment, be the first to comment !";
}
else {
	$commentA = "Comment ($commentNbr[0])";
}
?>