<?php
require_once('../class/categories.php'); 
$categorie = new Categories(); 
$nameCategories = $categorie->getCategories(); 
//var_dump($nameCategories); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- LINK STYLESHEET -->
    <link rel="stylesheet" href="../CSS/header.css">
    <!-- LINK FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINK ITEMS.CSS -->
    <link rel="stylesheet" href="../CSS/items.css">

    <title>Document</title>
</head>
<body>
<div class="conteneur">
    <div class="sidebar">

        <h2>Double Bouclier</h2>
        <ul>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <li><a href="profil.php">Profil</a></li>
            <!-- DROPDOWWWWWWWWWWWWN -->
            <?php 
            foreach ($nameCategories as $nameCategorie) {
                $id_category = $nameCategorie['id_categorie'];
            ?>
            <div class="dropdown"> 
                <button class="dropbtn">
                <a href="categories.php?id=<?= $id_category ?>">
                <?= $nameCategorie ["nom_categorie"]?>
                </a>
                </button>
                <div class="dropdown-content">
                    <?php $sousCategory = $categorie->getSouscategories($id_category);
                    // var_dump($sousCategory);
                    foreach($sousCategory as $sousCat){?>
                    <a href="souscategories.php?id=<?= $sousCat["id_sscategorie"] ?>"><?= $sousCat['nom'] ?></a>
                    <?php 
                    }
                    ?>
                </div>
            </div>
            <?php }?>
            <li><a href="#">Panier</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Index</a></li>
        </ul>

    <div class="social_media">
        <ul>
            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
        </ul>
    </div>
    </div>
</div> 



