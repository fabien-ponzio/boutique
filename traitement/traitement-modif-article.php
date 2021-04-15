<?php
require '../functions/db.php';

$database=connect();
//execuxion de la requette
$id=$_GET["id"];
$non=$_POST["nom"];
$taille=$_POST["taille"];
$prix=$_POST["prix"];
$couleur=$_POST["couleur"];
$categories=$_POST["categorie"];
$sscategorie=$_POST["souscategorie"];



if (!empty($id)&& !empty($non)&&!empty($taille)&&!empty($prix)&&!empty($couleur) && !empty($categories) && !empty($sscategorie) ){
   
   if (is_numeric($prix)==true){
      
      
      $requette=$database->prepare("UPDATE articles SET id_categorie= $categories ,id_sscategorie = $sscategorie, nom='$non',taille='$taille',prix=$prix,id_color=$couleur WHERE id_article=$id");

      $requette->execute();

      header("location: ../articles.php");
    
   };
    
};


?>