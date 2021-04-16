<?php 
require "traitement/traitement-admin.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>color</title>
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
    <main class="container">
    <h1 class="text-center">Les couleurs</h1>
        <table class="table table-bordered w-50 ml-auto mr-auto mt-5">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<count($color);$i++) :?>
                <tr>
                    <td><?= $color[$i]["color_name"]?></td>
                    <td><button class="btn btn-danger" ><a href="traitement/supprimer.color.php?id=<?=$color[$i]["id_color"]?>">Supprimer</a></button></td>
                </tr>
                <?php endfor;?>
            </tbody>
        </table>
    <?php

    if(isset($_SESSION["erreur"])){
        echo $_SESSION["erreur"];
    }
    if(isset($_SESSION["succes"])){
        echo $_SESSION["succes"];

    }

    ?>


    <form class="w-50 ml-auto mr-auto mt-5" action="traitement/traitement-ajoutcolors.php"method="POST">
        <div>
            <label for="ajout">ajout de couleur</label>
            <input class="form-control"type="text"name="color">
            <input class="btn btn-info d-block  ml-auto mr-auto mt-2" type="submit">
        </div>
    </form>

</main>
<footer>


</footer>
<?php unset($_SESSION["erreur"],$_SESSION["succes"]) ?>
    
</body>
</html>