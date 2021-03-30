<?php 
$database = ('../functions/db.php');
require_once('../functions/db.php');
require_once('../class/user.php');
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

    <label for="name">Nom</label>
    <input type="text" name="name">

    <label for="surname">Prénom</label>
    <input type="text" name="surname">

    <label for="newLogin">Nouveau Pseudo</label>
    <input type="text" name="newLogin">

    <label for="newMail">Nouvelle adresse mail</label>
    <input type="email" name="newMail">

    <label for="oldPassword">Nouveau Mot de passe</label>
    <input type="password" name="newPassword">

    <label for="newPassword">Confirmation du mot de passe</label>
    <input type="password" name="confPassword">

    <input type="submit" name="submit" value="Envoyer">
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