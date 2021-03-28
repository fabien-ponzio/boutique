<?php
require '../db.php';
$database=connect();
$ss=$_POST["nom"];
$categorie=$_POST["categorie"];
if (!empty($ss) && !empty($categorie)){
    $requette=$database->prepare("INSERT INTO `sscategorie`( `id_categorie`, `nom`) VALUES ($categorie,'$ss')");
    $requette->execute();
    header ("location:../sous-categorie.php");
    

}else{
    echo"champ ne peux pas etre vide";
}





?>