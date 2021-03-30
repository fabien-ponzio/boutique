<?php
require '../db.php';
$database=connect();

$requette=$database->prepare("SELECT * FROM `categorie`");
$requette->execute();
$resultat=$requette->fetchAll();

$requette2=$database->prepare("SELECT * FROM `color` ");
$requette2->execute();

$resultats=$requette2->fetchall();
$requette3=$database->prepare("SELECT * FROM `sscategorie` ");
$requette3->execute();
$resultatss=$requette3->fetchAll();



?>