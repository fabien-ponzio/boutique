<?php
//PATH_PAGES
$path_index="../index.php"; 
$path_LOGO ="../image/logobb-bleu.png";
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_info ="infoUser.php"; 
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php";
$page='Article';
require_once('header.php'); 
$items = new Categories(); 
$id_items = $_GET['id']; 
// résultat
$getItemsinfo = $items->getItemsinfo($id_items);
?>
<link rel="stylesheet" href="../CSS/items.css">

<main class="wrapper_items">
<section class="item">
<?php
foreach($getItemsinfo as $itemInfos){?>
<h1>Vous choisissez : </h1>
<img src="../<?= $itemInfos['chemin_image']?>" alt="#">
<span><?= $itemInfos['nom'] ?></span>
<span><?= $itemInfos['taille'] ?></span>
<span><?= $itemInfos['prix']?>€</span>
<article class="addbasket">
<a class="addPanier" href="addpanier.php?id=<?=$id_items?>">Ajouter au panier</a>
</article>
</section>
<?php

}
?>
</div>
</main>

<footer>

</footer>
