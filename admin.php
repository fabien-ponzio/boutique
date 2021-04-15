<?php 


require 'traitement/traitement-admin.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admine</title>
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
if ($_SESSION['utilisateur']['droits'] != "admin"){
    header('location: index.php');
}
?>
</header>
<main class="container">
<h1 class="text-center">Espace administrateur</h1>
<?php
     if(isset($_SESSION["succes"])){
        echo "<p>".$_SESSION["succes"]."</p>";

}
    if(isset($_SESSION["erreur"])){
        echo "<p>".$_SESSION["erreur"]."</p>";
}

?>
    <form action=traitement/traitement-ajout-article.php method="POST">




        <div class="form-group">
            <label for="nom">Nom article</label>
            <input class="form-control"  type="text"id="nom" name="nom">
        </div>
   
        <div>
            <label for="prix">prix de article</label>
            <input class="form-control"   type="text"id="prix" name="prix">

        </div>
        <div>
            <label for="categorie">choisir une categorie</label>
            <select class="form-control"  name="categorie" id="categorie">
                <option value="">choisir une categorie</option>
                <?php for($i=0; $i<count($categories); $i++ ):?>
                <option value="<?=$categories[$i]["id_categorie"]?>"><?=$categories[$i]["nom_categorie"]?></option>
                 <?php endfor ;?>
            </select>

        </div>
        <div>
            <label for="souscategorie">souscategorie</label>
            <select class="form-control" name="souscategorie" id="souscategorie">
                    <option value="">choisir une sous categorie</option>
                    <?php for($i=0; $i<count($sscategories);$i++): ?>
                    <option value="<?=$sscategories[$i]["id_sscategorie"]?>"><?=$sscategories[$i]["nom"]?></option>
                    <?php endfor ;?>
            </select>
            <label for="taille">taille</label>
            <select class="form-control"  name="taille" id="taille">
                    <option value="">choisir ca taille</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
            </select>
                <label for="couleur">couleur</label>
                    <select class="form-control mb-4 " name="couleur" id="couleur">
                        <option value="">choisir la couleur</option>
                        <?php for($i=0;$i<count($color);$i++): ?>
                        <option value="<?=$color[$i]["id_color"]?>"><?=$color[$i]["color_name"]?></option>
                         <?php endfor ;?>
                    </select>
        </div>
        <div>
             <input class="btn btn-primary d-block m-auto " type="submit" value="Envoyer" />
    
        </div>
    </form>

</main>
<footer>
</footer>
<?php
    unset($_SESSION["erreur"],$_SESSION["succes"]);
?>
    
</body>
</html>