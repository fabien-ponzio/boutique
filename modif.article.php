<?php
require "traitement/traitement.categorie.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- CSS only -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification article</title>
</head>
<body>
<header>
<?php
    $page = "admin";
    //PATH_PAGES
    $path_index="index.php"; 
    $path_inscription = "pages/inscription.php"; 
    $path_connexion = "pages/connexion.php";
    $path_info ="pages/infoUser.php"; 
    $path_profil ="pages/profif.php"; 
    $path_cart = "pages/cart.php"; 
    $path_items = "pages/items.php";  
    $path_categories="categories.php"; 
    $path_souscategories="pages/souscategories.php";
        require 'pages/header.php';
    ?>

</header>
<h1 class="text-center">modification article</h1>
<main class="container">
    <form class="text-center"   action="traitement/traitement-modif-article.php?id=<?= $_GET["id"]?>"method="POST">
        <div class="form-group">
            <label for="article">non de article</label>
            <input class="form-control d-block w-50 m-auto" type="text"id="article"name="nom">


        </div>
    

        <div>
            <label for="modifiertaille">modifier la taille</label>
            <select class="form-select  d-block w-50 m-auto"  name="taille" id="modifier la  taille">
                <option value="choisie la taille"></option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>

        </div>
         <div>
            <label for="modifier le prix">modifier le prix</label>
            <input class="form-control d-block w-50 m-auto" type="text"id="prix"name="prix">
        </div>
         <div>
            <label for="modifier la couleur">modifier la couleur</label>
            <select class="form-select  d-block w-50 m-auto "   name="couleur" id="modifier la couleur">
                <option value="choisie la couleur"></option>
                <?php for($i=0;$i<count($resultat2);$i++): ?> 
                <option value="<?= $resultat2[$i]["id_color"]?>"><?= $resultat2[$i]["color_name"]?></option>
                <?php endfor; ?>

            </select>
        </div>
        <div>
            <label for="categorie">modifier la categorie</label>
            <select class="form-select  d-block w-50 m-auto "  name="categorie" id="categorie">
            <?php for($i=0;$i<count($resultat);$i++):?>
                <option value="<?=$resultat[$i]['id_categorie'] ?>"><?= $resultat[$i]["nom_categorie"]?></option>
            <?php endfor;?>

            </select>

        </div>
        <div>

            <label for="souscategorie">modifier la sous categorie</label>
            <select class="form-select  d-block w-50 m-auto"  name="souscategorie" id="souscategorie">
                <?php for($i=0;$i<count($resultat3);$i++):?>
                <option value="<?=$resultat3[$i]["id_sscategorie"]?>"><?=$resultat3[$i]["nom"]?></option>
                <?php endfor;?>

            </select>
        </div>        
        <input class="btn btn-default form-control d-block w-25  mt-3  d-block m-auto btn-primary " type="submit" value="Envoyer" />

    </form>
    
</main>
<footer>


</footer>
    
</body>
</html>