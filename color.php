<?php 
require "traitement/traitement-admin.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>color</title>
</head>
<body>
<header>
<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes

</header>
    <main>
        <table>
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
                    <td><button><a href="traitement/supprimer.color.php?id=<?=$color[$i]["id_color"]?>">Supprimer</a></button></td>
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


    <form action="traitement/traitement-ajoutcolors.php"method="POST">
        <div>
            <label for="ajout">ajout de couleur</label>
            <input type="text"name="color">
            <input type="submit">
        </div>
    </form>

</main>
<footer>


</footer>
<?php unset($_SESSION["erreur"],$_SESSION["succes"]) ?>
    
</body>
</html>