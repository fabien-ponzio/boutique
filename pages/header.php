<?php
ob_start(); 
//REQUIREEEE
if($page=="Accueil"){
    require_once('class/chemins_class.php');
    }else{
    require_once('../class/chemins_class.php'); 
    }

$db  = connect(); 
$formatter =  new NumberFormatter('fr_FR', NumberFormatter::CURRENCY); 
$panier = new Panier(); 
$categorie = new Categories(); 
$nameCategories = $categorie->getCategories(); 


if (isset($_POST['deconnexion'])) {
    $user = new User(); 
    $user->Disconnect(); 
    if ($page==="Accueil") {
    header('location:index.php'); 
    }else{
    header('location:connexion.php'); 
    }
}
//var_dump($nameCategories); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- LINK STYLESHEET -->
<?php
if ($page=="Accueil") {?>
    <link rel="stylesheet" href="CSS/header.css">
    <?php
}else{?> 
    <link rel="stylesheet" href="../CSS/header.css">
<?php
}?>
        <!-- LINK BOOTSTRAP -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
        <!-- LINK FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- POLICE TITRE -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight:wght@700&display=swap" rel="stylesheet">
font-family: 'Zilla Slab Highlight', cursive; 
<!-- POLICE TEXTE -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
font-family: 'Arvo', serif;



    <title>Double Bouclier -<?= $page?></title>
</head>
<body>
<div class="conteneur">
    <div class="sidebar">

        <h2>Double Bouclier</h2>
        <?php if (isset($_SESSION['utilisateur'])){
            ?>
            <ul>
                <li><a href=<?=$path_cart?> >Panier <?= $panier->count()?></a></li>
                <li><a href=<?=$path_info?> >Profil</a></li>

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
                    foreach($sousCategory as $sousCat){?>
                    <a href="<?=$path_souscategories?>?id=<?= $sousCat["id_sscategorie"] ?>"><?= $sousCat['nom'] ?></a>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
                 <?php }?>
            <?php }else{
                ?>
                        <ul>
                <li><a href="<?=$path_inscription?>">Inscription</a></li>
                <li><a href="<?=$path_connexion?>">Connexion</a></li>
                <?php } ?>
                <li><a href="<?=$path_index?>">Index</a></li>
                </ul>
            <?php if(isset($_SESSION['utilisateur'])){ ?>
            <span class="hello">Hello @<?= $_SESSION['utilisateur']['login']?></span>
            <li class="bouton_deco">
                <a href="">
                    <form action="connexion.php" method="POST">
                        <input class="logout" type="submit" name="deconnexion" value="deconnexion">
                    </form>
                </a>
            </li>
            <?php } ?>
            </div>
        </ul>

    </div>
</div> 
<?php ob_end_flush();?>
<footer>
</footer>