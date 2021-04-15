<?php
require 'functions/db.php';
$database=connect();
$requette=$database->prepare("SELECT * FROM `categorie`");
$requette->execute();
$resultat=$requette->fetchAll(PDO::FETCH_ASSOC);



$requette2=$database->prepare("SELECT * FROM `color`" );
$requette2->execute();
$resultat2=$requette2->fetchAll(PDO::FETCH_ASSOC);



$requette3=$database->prepare("SELECT * FROM `sscategorie` ");
$requette3->execute();
$resultat3=$requette3->fetchAll(PDO::FETCH_ASSOC);









?>