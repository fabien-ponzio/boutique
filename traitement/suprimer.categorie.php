<?php

require '../db.php';

$database=connect();

$id=$_GET["id"];

$requette=$database ->prepare("DELETE FROM `categorie` where `id_categorie`=$id");
$requette->execute();

header('location: ../categorie.php');

?>