<?php

//je me connecte a la bdd
require '../functions/db.php';

$database=connect();
//recuperation de donner du formulaire
$nom=$_POST['nom'];

$prix=$_POST['prix'];
$categorie=$_POST['categorie'];
$sscategorie=$_POST['souscategorie'];
$taille=$_POST['taille'];
$couleur=$_POST['couleur'];


//verifier si le formulaire et pas vide
if( !empty($nom)&& !empty ($prix) && !empty ($categorie) && !empty($sscategorie) && !empty($taille) &&!empty($couleur) ){
    //requette enregristrement article
    if(is_numeric($prix)==true){

        $article=$database->prepare("INSERT INTO articles ( id_categorie, id_sscategorie, nom, taille, prix, id_color) VALUES (?,?,?,?,?,?)") ;
        $article->execute([$categorie,$sscategorie,$nom,$taille,$prix,$couleur]);
        $_SESSION["sucess"]="Produit enregistré";
        header("location: ../admin.php");

    }else{
       
        $_SESSION["erreur"]="Erreur de prix";
        header("location: ../admin.php");
    }
}

else{
    $_SESSION["erreur"]="Tout les champs doivent etre remplis";
    header("location: ../admin.php");
    
}


?>