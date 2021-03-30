<?php
require '../db.php';
$database=connect();

$id=$_GET["id"];

$requette=$database->prepare("DELETE FROM `sscategorie`where id_sscategorie=$id" );
$requette->execute();

header("location: ../sous-categorie.php");




?>