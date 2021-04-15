
<?php
require '../functions/db.php';

$ajoute=$_POST['color'];
if(!empty($ajoute)){
    
    $database=connect();
    $requette=$database->prepare("INSERT INTO `color`( `color_name`) VALUES ('$ajoute')");
    $requette->execute();
    $_SESSION['succes']='Couleur enregistré';
    header("location: ../color.php");

}else{
    echo"erreur";
    $_SESSION['erreur']='Champ ne peux pas etre vide';
    header("location:../color.php");
}


?>