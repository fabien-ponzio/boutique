<?php
//PATH_PAGES
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
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
<main>
<div class="displayItems">
<?php
var_dump($getItemsinfo); 
foreach($getItemsinfo as $itemInfos){?>
<img src="../<?= $itemInfos['chemin_image']?>" alt="#">
<span><?= $itemInfos['nom'] ?></span>
<span><?= $itemInfos['taille'] ?></span>
<span><?= $itemInfos['prix'] ?></span>
<a class="add addPanier" href="addpanier.php?id=<?=$id_items?>">Ajouter au panier</a>
<?php
}
?>
</div>
</main>

<footer>

</footer>
