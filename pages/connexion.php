<?php 
// REQUIRE 
$database = ('../functions/db.php');
require_once('../functions/db.php');
require_once('../class/user.php');
// PATH PAGES 
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "";
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


<main
>
    <div class="wrapper">
    <div class="border"></div>
    <div class="main-element">

    <form action="" method="POST">
        <label for="login">login</label>
        <input type="text" name="login">

        <label for="password" name="password">password</label>
        <input type="password" name="password">

        <input type="submit" name="connect" value="go!">
    </form>

</div>
</div>
</div>
</main>