<?php 
$page="profil"; 
//PATH_PAGES
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_profil =""; 
$path_cart = "cart.php"; 
$path_items = "items.php";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php";
require_once('header.php'); 
?>
<link rel="stylesheet" href="../CSS/profil.css">

<main>
<div class="update-box">
<form action="profil.php" method="POST">
  
  <h1>Mise à jour du profil</h1>

      <div class="user-box">
      <label for="country">Pays</label>
      <input type="text" name="country" required="">
      </div>

      <div class="user-box">
      <label for="city">Ville</label>
      <input type="text" name="city" required="">
      </div>

      <div class="user-box">
      <label for="postCode">Code Postal</label>
      <input type="text" name="postCode" required="">
      </div>

      <div class="user-box">
      <label for="city">Rue</label>
      <input type="text" name="street" required="">
      </div>

      <div class="user-box">
      <label for="city">Numéro de Rue</label>
      <input type="text" name="number" required="">
      </div>

      <div class="user-box">
      <label for="nom">Nom</label>
      <input type="text" name="name" required="">
      </div>

      <div class="user-box">
      <label for="prenom">Prénom</label>
      <input type="text" name="surname" required="">
      </div>

      <div class="user-box">
      <label for="newLogin">Nouveau Login</label>
      <input type="text" name="newLogin" required="">
      </div>

      <div class="user-box">
      <label for="newLogin">Nouveau Mail</label>
      <input type="text" name="newMail" required="">
      </div>

      <div class="user-box">
      <label for="newLogin">Nouveau mot de passe </label>
      <input type="password" name="newPassword" required="">
      </div>

      <div class="user-box">
      <label for="newLogin">Confirmez votre nouveau mot de passe </label>
      <input type="password" name="confPassword" required="">
      </div>
  <input type="submit" class="submit" name="submit" value="Mettre à jour mon profil">
</form>
</div>
<?php
if (isset($_POST['submit'])){
    $user = new User; 
    $user->profile($_POST['newLogin'], $_POST['newMail'], $_POST['newPassword'], $_POST['confPassword'], $_POST['country'], $_POST['city'], $_POST['postCode'], $_POST['street'], $_POST['number'],  $_POST['name'], $_POST['surname']); 
}
?>
</main>