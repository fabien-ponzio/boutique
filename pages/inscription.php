<?php
//REQUIRE
$page="inscription";

// PATH PAGES 
$path_index="../index.php"; 
$path_inscription = ""; 
$path_connexion = "connexion.php";
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
<link rel="stylesheet" href="CSS/inscription.css">

    <main class="page">

    <form method="POST">
        <div>
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="login">
        </div>

        <div>
            <label for="exampleInputEmail1">Adresse E-Mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email">
        </div>

        <div>
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" id="InputPassword1" name="password">
        </div>

        <div>
            <label for="exampleInputPassword1">Confirmez votre mot de passe </label>
            <input type="password" class="form-control" id="InputPassword2" name="confirmPW">
        </div>

        <button type="submit" name="register" class="btn btn-primary">Go</button>
        </form>
    </main>
</body>
</html>