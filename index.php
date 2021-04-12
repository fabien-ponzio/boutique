<?php 
// PATH PAGES 
$page="Accueil";
$path_index =""; 
$path_inscription = "pages/inscription.php"; 
$path_connexion = "pages/connexion.php";
$path_profil ="pages/profil.php"; 
$path_cart = "pages/cart.php"; 
$path_items ="pages/items.php";  
$path_categories="pages/categories.php"; 
$path_souscategories="pages/souscategories.php";
$page="Accueil";
require_once('pages/header.php'); 
?>
<!-- <link rel="stylesheet" href="../CSS/items.css">
<link rel="stylesheet" href="../CSS/connexion.css">
<link rel="stylesheet" href="../CSS/inscription.css">
<link rel="stylesheet" href="../CSS/profil.css">
<link rel="stylesheet" href="../CSS/cart.css">
<link rel="stylesheet" href="../CSS/items.css"> -->
<link rel="stylesheet" href="CSS/index.css">
<!-- <link rel="stylesheet" href="../CSS/souscategories.css"> -->
<?php
$produitPhare = $categorie->produitsPhare(); 
?>

<body>
<main class="wrapper_produitsphares">
    <h1>Nos produits phares</h1>

    <section class="wrapper_item">
    <?php 
    foreach($produitPhare as $article){?>
    <article class="displayItems">

    <?php $Pictures = $categorie->getPictures($article['id_article']); //var_dump($Pictures); ?>
    <a href="items.php?id=<?=$article['id_article']?>"><img src="<?= $Pictures['chemin_image']?>" alt="#"></a>
    <a href="items.php?id=<?=$article['id_article']?>"><?= $article['nom']?></a>
    <p><?= $article['taille']?></p>
    <p><?= $article['prix']?> €</p>

    </article>
    <?php
}
?>
</body>
</html>