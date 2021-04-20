<?php
$page="categories"; 
// require_once('../functions/db.php'); 
require_once('../functions/db.php');
// require_once('../class/categories.php'); 
//PATH_PAGES
$path_index="../index.php"; 
$path_LOGO ="../image/logobb-bleu.png";
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_info ="infoUser.php"; 
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="items.php";  
$path_categories=""; 
$path_souscategories="souscategories.php"; 
require_once('header.php'); 

//$database=connect(); 
// affiche les catégories et les sous catégories associés 

$categorie = new Categories(); 
$allCategories = $categorie->AllCategories(); 
$getItems = $categorie->getItemsbycat($_GET['id']); 
//var_dump($getItems); 
$nameCategorie = $categorie->getNameCategorie($_GET['id']);
?>
<link rel="stylesheet" href="../CSS/categories.css">
<body>
<main class="wrapper_categories">
    <h1>Catégorie <?=$nameCategorie['nom_categorie']?></h1>

    <section class="wrapper_item">
    <?php 
    foreach($getItems as $article){?>
    <article class="displayItems">

    <?php $Pictures = $categorie->getPictures($article['id_article']); //var_dump($Pictures); ?>
    <a href="items.php?id=<?=$article['id_article']?>"><img src="../<?= $Pictures['chemin_image']?>" alt="#"></a>
    <a href="items.php?id=<?=$article['id_article']?>"><?= $article['nom']?></a>
    <p><?= $article['taille']?></p>
    <p><?= $article['prix']?> €</p>

    </article>
    <?php
}
?>
</body>
</html>