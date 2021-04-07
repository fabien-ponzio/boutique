<?php
//REQUIREEEE
require('class/chemins_class.php'); 
$db  = connect(); 
$formatter =  new NumberFormatter('fr_FR', NumberFormatter::CURRENCY); 
$panier = new Panier(); 
$categorie = new Categories(); 
$nameCategories = $categorie->getCategories(); 


if (isset($_POST['deconnexion'])) {
    $user = new User(); 
    $user->Disconnect(); 
}
//var_dump($nameCategories); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- LINK STYLESHEET -->
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/items.css">
    <link rel="stylesheet" href="./CSS/connexion.css">
    <link rel="stylesheet" href="./CSS/inscription.css">
    <link rel="stylesheet" href="./CSS/profil.css">
    <link rel="stylesheet" href="./CSS/cart.css">
    <link rel="stylesheet" href="./CSS/items.css">
    <link rel="stylesheet" href="./CSS/index.css">
        <!-- LINK BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <!-- LINK FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   


    <title>Double Bouclier -<?= $page?></title>
</head>
<body>
<div class="conteneur">
    <div class="sidebar">

        <h2>Double Bouclier</h2>
        <?php if (isset($_SESSION['utilisateur'])){?>
            <ul>
                <li><a href=<?=$path_cart?> >Panier <?= $panier->count()?></a></li>
                <li><a href=<?=$path_profil?> >Profil</a></li>
                <!-- DROPDOWN CATEGORIES -->
                
                <?php 
                foreach ($nameCategories as $nameCategorie) {
                    $id_category = $nameCategorie['id_categorie'];
                ?>
               <div class="dropdown"> 
                <button class="dropbtn">
                <a href="<?=$path_categories?>?id=<?= $id_category ?>">
                <?= $nameCategorie ["nom_categorie"]?>
                </a>
                </button>
                <div class="dropdown-content">
                    <?php $sousCategory = $categorie->getSouscategories($id_category);
                    // var_dump($sousCategory);
                    foreach($sousCategory as $sousCat){?>
                    <a href="<?=$path_souscategories?>?id=<?= $sousCat["id_sscategorie"] ?>"><?= $sousCat['nom'] ?></a>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
                 <?php }?>
                
            <?php } else {
                if (isset($_SESSION[''])) {
                    # code...
                }
                ?>
            
            <li><a href="<?=$path_inscription?>">Inscription</a></li>
            <li><a href="<?=$path_connexion?>">Connexion</a></li>
            <?php } ?>
            <li><a href="#">Contact</a></li>
            <li><a href="<?=$path_index?>">Index</a></li>
                </div>
        </ul>

    <div class="social_media">
        <ul>
            <li>
            <form action="connexion.php" method="POST">
                <input type="submit" name="deconnexion">
            </form>
            </li>
            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
        </ul>
    </div>
    </div>
</div> 
