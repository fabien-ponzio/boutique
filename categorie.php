

<?php include "traitement/traitement.categorie.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title>
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
        <tr>
            <td>nom</td>
            <td>suprimer</td>
        </tr>
        <?php for($i=0;$i<count($resultat);$i++):?>

        <tr>
            <td><?php echo$resultat[$i]['nom_categorie']?></td>
            <td><button type="button"><a href="traitement/suprimer.categorie.php?id=<?php echo $resultat[$i]["id_categorie"] ?>">supprimer</a></button></td>
        </tr>
        <?php endfor;?>
    </table>
    <?php
        if(isset($_SESSION["succes"])){
            echo $_SESSION["succes"];

    }
        if(isset($_SESSION["erreur"])){
            echo $_SESSION["erreur"];
    }

    ?>

    <form action="traitement/formulaire-categorie.php"method="POST">
        <label for="categorie">non de categorie</label>
        <input type="text"name="categorie">
        <input type="submit">
    </form>

</main>
<footer>

</footer>
    
</body>
<?php unset($_SESSION["erreur"],$_SESSION["succes"])?>
</html>