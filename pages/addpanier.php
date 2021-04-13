<?php
//PATH_PAGES
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_info ="infoUser.php"; 
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="items.php";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php";
$page="Ajout Panier";
require_once('header.php');

if(isset($_GET)){
$id_article = $_GET['id']; 
}
?>

<section class="addpanier">
<?php
if (isset($id_article)) {
    // j'appelle la methode get product qui fait parti de la classe panier et qui peut me permettre de récupérer les informations d'un produit en paramètres je lui passe l'id article 
    $product = $panier->getProducts($id_article); 
    if (empty($product)) {
        die("Ce produit n'existe pas"); 
    }
    $panier->add($product[0]->id_article); 
    die('le produit a bien été ajouté à votre panier <div class="retourboutique"><a href="javascript:history.back()">retourner à la boutique</a></div>'); 
    }else {
    die("Vous n'avez pas sélectionné de produit à ajouter au panier <a href='javascript:history.back()'>retourner à la boutique</a>"); 
}
?>
</section>