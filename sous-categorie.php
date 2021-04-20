<?php
require 'traitement/traitement.categorie.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    
  
    <title>souscategorie</title>
</head>
<body>
<header>
<?php
    $page = "admin";
    //PATH_PAGES
    $path_LOGO ="./image/logobb-bleu.png";
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
<main class="container">
<h1 class="text-center">Les sous-catégories</h1>
    <table class="table table-bordered w-50 ml-auto mr-auto mt-5">
        <thead>
            <tr>
                <th>sous-categorie</th>
                <th>supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($resultat3);$i++ ):?>
            <tr>
                <td><?=  $resultat3[$i]['nom']; ?></td>
                <td><button class="btn btn-danger"><a href="traitement/supprimer-sscategorie.php?id=<?=$resultat3[$i]["id_sscategorie"]?>">supprimer</a></button></td>
            </tr>
            <?php endfor;?>
        </tbody>

    </table>
    
    <form class="w-50 ml-auto mr-auto mt-5" action="traitement/ajouter-sscategorie.php"method="POST">
    <p>Ajouter une sous-catégorie </p>
    <div>
    
        <select class="form-control" name="categorie" id="">
            <?php for ($i=0;$i <count($resultat);$i++):   ?>
            <option value="<?=$resultat[$i]["id_categorie"] ?>"><?=$resultat[$i]["nom_categorie"]?></option>
            <?php endfor; ?>

        </select>
        </div>
        <div>
        <label for="">nom de la sous-categorie</label>
        <input class="form-control mb-3" type="text"name="nom">
        <input  class="btn btn-info d-block m-auto" type="submit"value="Enregistrer">
        </div>
    </form>


</main>
<footer>

</footer>
    
</body>
</html>