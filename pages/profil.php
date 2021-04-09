<?php 
$page="profil"; 
// require_once('../functions/db.php');
// require_once('../class/user.php');
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
<link rel="stylesheet" href="CSS/profil.css">

<main>

<form action="profil.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="country">Pays</label>
      <input type="text" class="form-control" id="input1" name="country">
    </div>
    <div class="form-group col-md-6">
      <label for="city">Ville</label>
      <input type="text" class="form-control" id="input2" name="city">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="postCode">Code Postal</label>
      <input type="text" class="form-control" id="input3" name="postCode">
    </div>
    <div class="form-group col-md-6">
      <label for="city">Rue</label>
      <input type="text" class="form-control" id="input4" name="street">
    </div>
    <div class="form-group col-md-6">
      <label for="city">Numéro de Rue</label>
      <input type="text" class="form-control" id="input5" name="number">
    </div>
  </div>
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="input6" placeholder="" name="name">
  </div>
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="text" class="form-control" id="input7" placeholder="" name="surname">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="newLogin">Nouveau Login</label>
      <input type="text" class="form-control" id="input8" name="newLogin">
    </div>
    <div class="form-group col-md-6">
      <label for="newLogin">Nouveau Mail</label>
      <input type="text" class="form-control" id="input9" name="newMail">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="newLogin">Nouveau mot de passe </label>
      <input type="password" class="form-control" id="input10" name="newPassword">
    </div>
    <div class="form-group col-md-6">
      <label for="newLogin">Confirmez votre nouveau mot de passe </label>
      <input type="password" class="form-control" id="input11" name="confPassword">
    </div>
  </div>

  <button type="submit" name="submit" value="Envoyer" class="btn btn-primary">Mettre à jour mon profil</button>
  <input type="submit" name="submit" value="Envoyer">

</form>

<?php
if (isset($_POST['submit'])){
    $user = new User; 
    $user->profile($_POST['newLogin'], $_POST['newMail'], $_POST['newPassword'], $_POST['confPassword'], $_POST['country'], $_POST['city'], $_POST['postCode'], $_POST['street'], $_POST['number'],  $_POST['name'], $_POST['surname']); 
}
?>
</form>
</main>