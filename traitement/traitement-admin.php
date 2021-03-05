<?php
require 'db.php';
$database=connect();

//execution de la requette
$requette=$database->prepare('SELECT * FROM `categorie`');
$requette->execute();
$categories=$requette->fetchAll(PDO::FETCH_ASSOC);

$requette1=$database->prepare('SELECT * FROM `sscategorie`' );
$requette1->execute();
$sscategories=$requette1->fetchAll(PDO::FETCH_ASSOC);
var_dump($sscategories);


var_dump($categories);

?>