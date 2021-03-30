<?php
require_once('../functions/db.php'); 
class Categories 
{
    public $db; 

    public function __construct()
    {
        $this->db = Connect(); 
    }

// Récupère toutes les catégories et sous-catégories associées

    public function AllCategories (){
    $GetCategories = $this->db->prepare("SELECT * FROM categorie INNER JOIN sscategorie ON categorie.id_categorie= sscategorie.id_categorie"); 
    $GetCategories->execute();
    $fetch = $GetCategories->fetchAll(PDO::FETCH_ASSOC); 
    return $fetch; 
}
// Récupère toutes les catégories

    public function getCategories (){
    $GetCategories = $this->db->prepare("SELECT * FROM categorie"); 
    $GetCategories->execute();
    $fetch = $GetCategories->fetchAll(); 
    return $fetch; 
}

// Récupère toutes les article en fonction de l'ID de la sous-catégorie

public function getItems ($id_sscategorie){
    $getItems = $this->db->prepare("SELECT * FROM articles WHERE id_sscategorie = $id_sscategorie"); 
    $getItems->execute();
    $fetch = $getItems->fetchAll(); 
    return $fetch; 
}

// Récupère toutes les sous-catégories en fonction de l'ID catégorie 

public function getSouscategories ($idCategorie){
    $GetSousCategories = $this->db->prepare("SELECT * FROM sscategorie WHERE id_categorie =$idCategorie"); 
    $GetSousCategories->execute();
    $SousCategories = $GetSousCategories->fetchAll(PDO::FETCH_ASSOC); 
    return $SousCategories; 
}

// Récupère les noms des sous-catégories

public function getNameSousCategorie ($idSousCategorie){
    $GetNameSousCategories = $this->db->prepare("SELECT * FROM sscategorie WHERE id_sscategorie =$idSousCategorie"); 
    $GetNameSousCategories->execute();
    $NameSousCategories = $GetNameSousCategories->fetch(); 
    return $NameSousCategories; 
}


// Récupère tous les articles en fonction de l'Id sous-catégorie

public function getPictures ($id_article){
    $getPictures = $this->db->prepare("SELECT * FROM image_article WHERE id_article = $id_article"); 
    $getPictures->execute();
    $fetch = $getPictures->fetch(); 
    return $fetch; 
}

public function getItemsinfo($id_article){
    $getItemsinfo = $this->db->prepare("SELECT * FROM articles INNER JOIN image_article ON articles.id_article=image_article.id_article WHERE articles.id_article = $id_article"); 
    $getItemsinfo->execute(); 
    $fetch = $getItemsinfo->fetchAll(PDO::FETCH_ASSOC); 
    return $fetch; 
}
}