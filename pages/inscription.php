<?php
//REQUIRE
$page="inscription";

// PATH PAGES 
$path_index="../index.php"; 
$path_inscription = ""; 
$path_connexion = "connexion.php";
$path_info ="infoUser.php"; 
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="items.php";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php"; 
require_once('header.php'); 

if (isset($_POST['register'])) {
    $user = new User(); 
    $user->register($_POST['login'],$_POST['email'],$_POST['password'],$_POST['confirmPW']); 
    $_SESSION['user']=$user; 
    var_dump($user); 
}
?>
<link rel="stylesheet" href="../CSS/inscription.css">

<main>
<div class="login-box">
  <form method="POST">
  <h1>Inscription</h1>
    <div class="user-box">
      <input type="text" name="login" required="">
      <label>Login</label>
    </div>
    <div class="user-box">
      <input type="email" name="email" required="">
      <label>E-Mail</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required="">
      <label>Mot de passe</label>
    </div>
    <div class="user-box">
      <input type="password" name="confirmPW" required="">
      <label>Confirmez votre mot de passe</label>
    </div>
    <input class="register" type="submit" name="register">
    <a href="#">
    </a>
    </form>
</div>    
</main>