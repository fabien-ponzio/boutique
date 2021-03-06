<?php
ob_start(); 
//REQUIREEEE

if($page=="Accueil" || $page == "admin"){
    require_once('class/chemins_class.php');
    }
    else{
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
    header('location:../pages/connexion.php'); 
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
if ($page=="Accueil" || $page =="admin") {?>
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
<!-- POLICE TEXTE -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">



    <title>Double Bouclier -<?= $page?></title>
</head>
<body>
<div class="conteneur">
    <div class="sidebar">

    <img  class="LOGO" src="<?= $path_LOGO ?>" alt="">
        <?php if ($page == "admin") :?>
            <ul>
                <li><a href="admin.php">Ajouter un article </a></li>
                <li><a href="articles.php">Les articles </a></li>
                <li><a href="categorie.php">Les catégories </a></li>
                <li><a href="sous-categorie.php">Les sous-catégories </a></li>
                <li><a href="color.php">Les couleurs </a></li>
                <li><a href="index.php">Retour boutique</a></li>
            </ul>
        <?php else :?>
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
                    <?php if ($_SESSION['utilisateur']['droits'] == "admin") :?>
                        <?php if ($page == "Accueil") :?>
                            <li><a href="admin.php">Espace administrateur</a></li>
                        <?php else :?>
                            <li><a href="../admin.php">Espace administrateur</a></li>
                        <?php endif ;?>
                <?php endif ;?>
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
                        <form action="" method="POST">
                            <input class="logout" type="submit" name="deconnexion" value="deconnexion">
                        </form>
                    </a>
                </li>
                <?php } ?>
                </div>
               
            </ul>
        <?php endif ;?>

    </div>
</div> 
<?php ob_end_flush();?>
<footer>
</footer>