<?php
require_once('header.php'); 
$id_article = $_GET['id']; 

if (isset($id_article)) {
    // j'appelle la methode get product qui fait parti de la classe panier et qui peut me permettre de récupérer les informations d'un produit en paramètres je lui passe l'id article 
    $product = $panier->getProducts($id_article); 
    if (empty($product)) {
        die("Ce produit n'existe pas"); 
    }
    // var_dump($product);
    // var_dump($product[0]->id_color); 
    // var_dump($product[0]->id_article); 

    $panier->add($product[0]->id_article); 
    die('le produit a bien été ajouté à votre panier <a href="javascript:history.back()">retourner à la boutique</a>'); 
    }else {
    die("Vous n'avez pas sélectionné de produit à ajouter au panier"); 
}
?>