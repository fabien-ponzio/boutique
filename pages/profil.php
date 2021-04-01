<?php 
$database = ('../functions/db.php');
require_once('../functions/db.php');
require_once('../class/user.php');
//PATH_PAGES
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php";
require_once('header.php'); 
var_dump($_POST);
var_dump($_SESSION['utilisateur']['id_utilisateurs']);

?>

<main>
<div class="wrapper">
    <div class="border"></div>
    <div class="main-element">

<h1>Adresse</h1>
    <form action="profil.php" method="POST">

    <label for="country">Pays</label>
    <input type="text" name="country">

    <label for="city">Ville</label>
    <input type="text" name="city">

    <label for="postCode">Code postal</label>
    <input type="text" name="postCode">

    <label for="street">Rue</label>
    <input type="text" name="street">

    <label for="number">Numéro de rue</label>
    <input type="number" name="number">


    <h1>Infos client</h1>

    <div class="row">
        <div class="column">
    <label for="name">Nom</label><br>
    <input type="text" name="name">
        </div>
        <div class="column" >
    <label for="surname">Prénom</label><br>
    <input type="text" name="surname">
        </div>
    </div>

    <div class="row">
        <div class="column">
    <label for="newLogin">Nouveau login</label><br>
    <input type="text" name="name">
        </div>
        <div class="column" >
    <label for="newMail">Nouveau mail</label><br>
    <input type="text" name="surname">
        </div>
    </div>

    <div class="row">
        <div class="column">
    <label for="name">Nouveau password</label><br>
    <input type="text" name="name">
        </div>
        <div class="column" >
    <label for="surname">Confirmation du mot de passe</label><br>
    <input type="text" name="surname">
        </div>
    </div>
    <div>
        <input type="submit" name="submit" value="Envoyer">
    </div>

</div>
</div>
</div>
<?php
if (isset($_POST['submit'])){
    $user = new User; 
    $user->profile($_POST['newLogin'], $_POST['newMail'], $_POST['newPassword'], $_POST['confPassword'], $_POST['country'], $_POST['city'], $_POST['postCode'], $_POST['street'], $_POST['number'],  $_POST['name'], $_POST['surname']); 
}
?>
</form>
</main>