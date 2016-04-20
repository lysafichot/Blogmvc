<?php
include"bdd/PDO.php";

$query = $bdd->query('SELECT category, id_category FROM category ORDER BY category ASC');
$liste_category = $query->fetchAll();
?>