<?php
function side() {
	include "bdd/PDO.php";

	echo "<div id='actu'>
	<div class=\"popular_article\">
	<h2>Popular Posts</h2>";
	$Populars = $bdd->prepare("SELECT article.id_article AS id_article, article.title AS title, article.nbr_comment, user.login AS login 
							FROM article LEFT JOIN user ON user.id_member = article.id_member 
							ORDER BY nbr_comment DESC LIMIT 5");
	$Populars->execute();
	while ($Popular = $Populars->fetch()) {
		echo "<a href=\"index.php?id=".$Popular['id_article']."\">
		<h3>".$Popular['title']."</h3>
		<sub><i> by ".$Popular['login']."
		</i></sub></a>";
	}
		echo "</div>";
	echo "<div class=\"last_comment\">
	<h2>Last Comments</h2>";
	$Latest = $bdd->prepare("SELECT comment.comment, comment.id_member, comment.id_comment,article.title, article.id_article, user.login, comment.date_comment FROM comment INNER JOIN article ON comment.id_article = article.id_article INNER JOIN user ON comment.id_member = user.id_member ORDER BY comment.date_comment DESC LIMIT 7");
	$Latest->execute();
	while ($Last = $Latest->fetch()) {
		echo "<div class=\"comment\"><a href=\"index.php?id=".$Last['id_article']."#".$Last['id_comment']."\"><h3>".$Last['login']." : </h3> <time>".$Last['date_comment']."</time> 
		<p>".$Last['comment']."</p>
		<sub><i> ".$Last['title']."</i></sub></a></div>";

	}
	echo "</div>";
}
?>