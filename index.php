<?php 
// PATH PAGES 
$page="Accueil";
$path_index =""; 
$path_inscription = "pages/inscription.php"; 
$path_connexion = "pages/connexion.php";
$path_info = "pages/infoUser.php"; 
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
    <h1>Bienvenue sur DoubleBouclier! </h1>
    <section class="intro">
        <p>Nous sommes une boutique de revente de pièces unique situé basé dans le centre ville de 
            Marseille depuis 2023. DoubleBouclier s'adresse à tout le monde, de l'article unique en passant par une selection de fripes vintages mais aussi des vestes que vous pouvez orner
            d'une sélection de patchs qui vous seront cousus sur place. N'hésitez pas à passer à notre boutique Marseillaise, vous pourrez admirez les articles étendus dans un puit de lumière ainsi que notre mur artistique collaboratif.
            La musique sera assuré par OSWLD. 
        </p>
    </section>
    
    <h2>Nos produits phares:</h2>

    <section class="wrapper_item">
    <?php 
    foreach($produitPhare as $article){?>
    <article class="displayItems">

    <?php $Pictures = $categorie->getPictures($article['id_article']); //var_dump($Pictures); ?>
    <a href="pages/items.php?id=<?=$article['id_article']?>"><img src="<?= $Pictures['chemin_image']?>" alt="#"></a>
    <a href="pages/items.php?id=<?=$article['id_article']?>"><?= $article['nom']?></a>
    <p><?= $article['taille']?></p>
    <p><?= $article['prix']?> €</p>

    </article>
    <?php
}
?>
</body>
</html>