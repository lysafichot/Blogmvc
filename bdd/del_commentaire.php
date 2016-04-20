<?php
session_start();
include "PDO.php";
if ($_SESSION) {
	if ($_POST['delete_com']) {
		$del_sql = "DELETE FROM comment WHERE id_comment = :id";
		$del = $bdd->prepare($del_sql);
		$del->bindparam(':id', $_POST['id_comment']);
		$del->execute();
		$del->closeCursor();
		header("location: ../".$_POST['fromA']);
	}
}
?>