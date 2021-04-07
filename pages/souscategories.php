<?php
require_once('../class/categories.php'); 
//PATH_PAGES
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="items.php";  
$path_categories="categories.php"; 
$path_souscategories="";
$page="Sous-Categorie";
require_once('header.php'); 
$categorie = new Categories(); 
$id_sscategorie = $_GET['id']; 
$nameSousCategorie = $categorie->getNameSousCategorie($id_sscategorie);
$Items = $categorie->getItems($id_sscategorie); 
// var_dump($Items); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/items.css">
    <title>Document</title>
</head>
<body>
<h1>SOUS-CATEGORIE <?=$nameSousCategorie['nom']?></h1>
<?php 
foreach($Items as $article){?>
<div class="displayItems">
<a href="items.php?id=<?=$article['id_article']?>"><?= $article['nom']?></a>
<span><?= $article['taille']?></span>
<span><?= $article['prix']?></span>
<?php $Pictures = $categorie->getPictures($article['id_article']); //var_dump($Pictures); ?>
    <a href="items.php?id=<?=$article['id_article']?>"><img src="../<?= $Pictures['chemin_image']?>" alt="#"></a>
</div>
<?php

}
?>
</body>
</html>