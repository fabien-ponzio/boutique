<?php
//je me connecte a la bdd
require '../db.php';
$database=connect();
//recuperation de donner du formulaire
$nom= $_POST['nom'];
$description= $_POST['desciption'];
$prix= $_POST['prix'];
$categorie=$_POST['categorie'];
$sscategorie=$_POST['souscategorie'];
$taille=$_POST['taille'];
$couleur=$_POST['couleur'];
var_dump($_POST);

//verifier si le formulaire et pas vide
if( !empty($nom) && !empty ($description) && !empty ($prix) && !empty ($categorie) && !empty($sscategorie) && !empty($taille) &&!empty($couleur) ){
    //requette enregristrement article
    if(is_numeric($prix)==true){
        $article=$database->prepare("INSERT INTO articles ( id_categorie, id_sscategorie, nom, taille, prix, couleur) VALUES (?,?,?,?,?,?)") ;
    $article->execute([$categorie,$sscategorie,$nom,$taille,$prix,$couleur]);

    }else{
        echo"probleme de prix";
    }
    
    



 echo 'le champ et bien rempli';
}

   



    

else{
    echo'tout les champ sont pas rempli';
}






?>