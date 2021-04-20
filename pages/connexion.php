<?php 
$page="connexion"; 
// PATH PAGES 
$path_LOGO ="../image/logobb-bleu.png"; 
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_info ="infoUser.php"; 
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="items.php";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php"; 
require_once('header.php'); 

if (isset($_POST["connect"])) {
    $user = new User(); 
    $user->connectUser($_POST['login'], $_POST['password']); 
}
?>

<link rel="stylesheet" href="../CSS/connexion.css">

<main>

<div class="connect-box">
  <form method="POST">
  <h1>Connexion</h1>
    <div class="user-box">
      <input type="text" name="login" required="">
      <label>Login</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Mot de passe</label>
    </div>
    <input class="connect" type="submit" name="connect">

  </form>
</div>
</main>