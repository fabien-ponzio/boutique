<?php
// require_once('../functions/db.php'); 
require_once '../functions/db.php';
// require_once('../class/categories.php'); 
//PATH_PAGES
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="";  
$path_categories="categories.php"; 
require_once('header.php'); 

//$database=connect(); 
// affiche les catégories et les sous catégories associés 

$categorie = new Categories(); 
$allCategories = $categorie->AllCategories(); 
// var_dump($allCategories); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 foreach ($allCategories as $cat) {?>
 <a href="souscategories.php?id=<?= $cat['id_sscategorie'] ?>"><?=$cat['nom']?></a>
 <?php
}; ?>
</body>
</html>