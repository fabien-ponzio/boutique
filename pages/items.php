<?php
require_once('../class/categories.php'); 
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
<a href="addpanier.php?id=<?=$id_items?>">Ajouter au panier</a>
<?php
}
?>
</div>
</main>

<footer>

</footer>
