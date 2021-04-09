<?php 
$page="connexion"; 
// PATH PAGES 
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
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

<link rel="stylesheet" href="CSS/connexion.css">

<main>

    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="InputLogin" name="login">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" id="InputPassword" name="password">
        </div>

        <input type="submit" name="connect" value="go!">
    </form>

</main>