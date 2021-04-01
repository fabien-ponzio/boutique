<?php
if (isset($_POST['register'])) {
        $user = new User(); 
        $user->register($_POST['login'],$_POST['email'],$_POST['password'],$_POST['confirmPW']); 
        $_SESSION['user']=$user; 
    }
//REQUIRE
$database = ('../functions/db.php');
require_once('../functions/db.php');
require_once('../class/user.php');
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

?>

    <main>

<div class="wrapper">

    <div class="border"> </div>

        <div class="main-element">
            
            <form id="registerForm" action="" method="POST">
                <div>
                    <label for="login">Login</label>
                    <input type="text" name="login">
                </div>
                <div>
                    <label for="email">E-Mail</label>
                    <input class="form_input" type="email" name="email">
                </div>
                <div>
                    <label for="password" name="password">Mot de Passe</label>
                    <input class="form_input" type="password" name="password">
                </div>
                <div>
                    <label for="confirmPW">Confirmez votre mot de passe</label>
                    <input class="form_input" type="password" name="confirmPW">
                </div>
                <div>
                    <input class="form_input" type="submit" name="register" value="go!">
                </div>
            </form>

        </div>

  </div>

    </main>
</body>
</html>