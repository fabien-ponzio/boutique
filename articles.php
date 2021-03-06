<?php
require '../boutique/functions/db.php';
$database=connect();
//execution de la requette
$requette=$database->prepare("SELECT * FROM `articles`");
$requette->execute();
$article=$requette->fetchAll(PDO::FETCH_ASSOC);
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
    
  



   
    <title>article</title>
</head>
<body>
<header>
<?php
$page ="admin";

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

require "pages/header.php";

?>
</header>

<main class="container">
<h1  class="text-center">Les articles</h1>

        
    <table class="table table-bordered  w-75 ml-auto mr-auto mt-5">
        <thead>
            <tr>
                <th>article</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td>nom de article</td>
                <td>prix</td>
                <td>modifier</td>
                <td>suprimer</td>
            </tr>
            <?php
                for($i=0;$i<count($article); $i++):?>
             <tr>
                <td><?php echo $article[$i]["nom"]?></td>
                <td><?php echo $article[$i]["prix"]?> €</td>
                <td> <button class="btn btn-warning"><a href="modif.article.php?id=<?= $article[$i]["id_article"]?>">modifier</a></button></td>
                <td> <button class="btn btn-danger"><a href="traitement/suprimer-article.php?id=<?=$article[$i]["id_article"]?>">supprimer</a> </button> </td>
                <td> </td>
            </tr>
            <?php endfor;?>

    

        </tbody>

    </table>



</main>

<footer>

</footer>
    
</body>
</html>