<?php

require '../db.php';
$categorie=$_POST["categorie"];
if(!empty($categorie)){

    $database=connect();
    
    $requette=$database->prepare("INSERT INTO `categorie`( `nom_categorie`) VALUES ('$categorie')");
    $requette->execute();

    $_SESSION["succes"]="Categorie enregistrée";
    header("location: ../categorie.php");

}else{
    $_SESSION["erreur"]="Le champ ne peux pas etre vide";
    header("location: ../categorie.php");
    
}

    





?>