<?php
function article($from, $id_article = NULL, $id_auteur = NULL, $date = NULL, $categorie = NULL, $tag = NULL) {
	include "bdd/PDO.php";
	if (!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$from = preg_replace('/&page=[0-9]+/', '', $from);
	$offset = ($_GET['page']-1)*10;
	if (isset($_GET['id'])) {
		include"bdd/commentaire_display_sql.php";
		$article = $bdd->prepare("SELECT * FROM article LEFT JOIN user ON article.id_member = user.id_member WHERE date_public <= NOW() AND id_article=:id");
		$article->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
		$article->execute();
		$article = $article->fetch();
		$content = preg_replace('/\[intro\](.+)\[\/intro\]/', '$1', $article['article']);
		$content = preg_replace('/\[b\](.*)\[\/b]/', '<b>$1</b>', $content);
		$content = preg_replace('/\[u\](.*)\[\/u]/', '<u>$1</u>', $content);
		$content = preg_replace('/\[i\](.*)\[\/i]/', '<i>$1</i>', $content);
		$content = preg_replace('/\[s\](.*)\[\/s]/', '<s>$1</s>', $content);
		$content = preg_replace('/\[img\](.*)\[\/img]/', '<img src="$1"/>', $content);
		$content = preg_replace('/\[video\](https:\/\/)*(http:\/\/)*(www\.)*(youtube\.com\/)(watch\?v\=)*(.*)\[\/video]/', '<iframe src="https://$4embed/$6" frameborder="0" allowfullscreen></iframe>', $content);
		$content = preg_replace('/\[url=(http:\/\/)*(.*)\](.*)\[\/url]/', '<a href="http://$2">$3</a>', $content);
		$tag_test = explode(', ', $article['tag_assign']);
		$html_tag = '';
		foreach ($tag_test as $value)
		{
			$html_tag .= '<span class="tag"><a href="#" title="'.$value.'">'.$value.'</a></span>';
		}
		echo '<script type="text/javascript" src="showComment.js"></script>
		<div class="article_content">
			<div class="image_article"><a href="'.$from."?id=".$article['id_article'].'" title=""><img src="img/article/'.$article['picture'].'" alt="'.$article['picture'].'"></a></div>
			<div class="article">
				<span class="date">By '.$article['login'].' <time datetime="'.$article['date_public'].'">'.$article['date_public'].'</time></span>
				'.$html_tag.'
				<h2>'.$article['title'].'</h2>
				<p>'.$content.'</p>
				<div class="footer_article">
					<div class="link_article">
						<ul>
							<li><a class="facebook" href="http://www.facebook.com/">&nbsp;</a></li>
							<li><a class="twitter" href="http://twitter.com">&nbsp;</a></li>
							<li><a class="g_plus" href="http://plus.google.com">&nbsp;</a></li>
							<li><a class="pinterest" href="http://pinterest.com">&nbsp;</a></li>
							<li><a class="linkedin" href="http://linkedin.com">&nbsp;</a></li>
						</ul>
					</div>
					<a id="commentA" href="javascript:void(0)">'.$commentA.'</a>
				</div>
			</div>
		</div>';

		echo "<div id=\"commentaire\">";
		if($_SESSION) {
			echo '<form class="post_comment" action="bdd/commentaire_sql.php" method="POST">
			<div class="sign-outer">
				<div class="sign-inner">
					<label for="title_comment">Your title : </label>
					<input type="text" name="title_comment" id="title_comment" placeholder="Title comment"/>
					<input type="hidden" name="id_article" value="'.$_GET['id'].'">
				</div>
			</div>
			<div class="sign-outer">
				<div class="sign-inner">
					<label for="comment">Your comment : </label>
					<textarea name="comment" id="comment" required></textarea>
					<input type="hidden" name="id_article" value="'.$_GET['id'].'">
					<input type="hidden" name="from" value="'.htmlspecialchars("index.php?id=".$_GET['id']).'#x">
				</div>
			</div>
			<input type="submit" name="valid_com" value="Envoyer">
		</form></div>';

	}
	if ($liste_commentaire) {
		echo "<div class=\"comment_article\">
		<h2>Comment</h2>";
		foreach ($liste_commentaire as $value) {
			$title_com = ucfirst($value['title_comment']);
			echo "<div id=\"".$value['id_comment']."\"<strong>By ".$value['login']."</strong>
			<time>".$value['date_comment']."</time>
			<h3>- " .htmlspecialchars($title_com)."</h3>
			<p>".htmlspecialchars($value['comment'])."</p>";
			if ($_SESSION) {
				if ($_SESSION['login'] == $value['login']) {
					echo "<a class=\"commentB\" href=\"javascript:void(0)\">Edit</a>
					<form method=\"POST\" action=\"bdd/del_commentaire.php\">
						<input type=\"hidden\" name=\"id_comment\" value=".$value['id_comment'].">
						<input type=\"hidden\" name=\"fromA\" value=\"".htmlspecialchars("index.php?id=".$_GET['id'])."#x\">
						<input type=\"submit\" name=\"delete_com\" value=\"Delete\">
					</form>";
				}
			}
			echo "</div>";
		}
	}
	else {
		echo "<p>Aucun commentaire</p>";

	}
	echo "</div></div>";
}
else {
	switch (true) {
		case $id_auteur:
		$where = "AND id_auteur=".$id_auteur;
		break;

		case $date:
		$where = "AND date_public=".$date;
		break;

		case $categorie:
		$where = "AND id_category=".$categorie;
		break;

		case $tag:
		$where = "AND tag_assign=".$tag;
		break;

		default:
		$where = "";
		break;
	}
	
	$articles = $bdd->prepare("SELECT * FROM article LEFT JOIN user ON article.id_member = user.id_member WHERE date_public <= NOW() ".$where." ORDER BY date_public DESC LIMIT ".$offset.",10");
	$articles->execute();
	$Count = $bdd->prepare("SELECT count(*) FROM article WHERE date_public IS NOT NULL ".$where);
	$Count->execute();
	$Count = $Count->fetch();
	while ($article = $articles->fetch()) {
		$tag_test = explode(', ', $article['tag_assign']);
		$html_tag = '';
		foreach ($tag_test as $value)
		{
			$html_tag .= '<span class="tag"><a href="#" title="'.$value.'">'.$value.'</a></span>';
		}
		$Intro = [];
		preg_match("/\[intro\].+\[\/intro\]/is", $article['article'], $Intro).PHP_EOL;
		$Intro0 = empty($Intro)? "" : preg_replace('/\[intro\](.+)\[\/intro\]/', '$1', $Intro[0]);
		echo '<div class="article_content">
		<div class="image_article"><a href="'.$from."?id=".$article['id_article'].'" title=""><img src="img/article/'.$article['picture'].'" alt="'.$article['picture'].'"></a></div>
		<div class="article">
			<span class="date">By '.$article['login'].' <time datetime="'.$article['date_public'].'">'.$article['date_public'].'</time></span>
			'.$html_tag.'
			<h2>'.$article['title'].'</h2>
			<p>'.$Intro0.'</p>
			<div class="footer_article">
				<span><a class="read_more" href="'.$from."?id=".$article['id_article'].'" title="Read More">Read More</a></span>
				<div class="link_article">
					<ul>
						<li><a class="facebook" href="http://www.facebook.com/">&nbsp;</a></li>
						<li><a class="twitter" href="http://twitter.com">&nbsp;</a></li>
						<li><a class="g_plus" href="http://plus.google.com">&nbsp;</a></li>
						<li><a class="pinterest" href="http://pinterest.com">&nbsp;</a></li>
						<li><a class="linkedin" href="http://linkedin.com">&nbsp;</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>';
}
if (isset($Count)) {
	if ($Count[0] > 10) {
		echo "<div class=\"pagin\">";
		if ($_GET['page'] != 1) {
			echo "<span class=\"showpageNum\"><a href=\"".$from."?page=".($_GET['page']-1)."\">Previous posts</a></span>";
		}
		if (($offset+10) <= $Count[0]) {
			echo "<span class=\"showpageNum\"><a href=\"".$from."?page=".($_GET['page']+1)."\">Next posts</a></span>";
		}
		echo "</div>";
	}
}
}
}
?>