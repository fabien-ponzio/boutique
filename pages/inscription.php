<?php
if (isset($_POST['register'])) {
        $user = new User(); 
        $user->register($_POST['login'],$_POST['email'],$_POST['password'],$_POST['confirmPW']); 
        $_SESSION['user']=$user; 
    }
$database = ('../functions/db.php');
require_once('../functions/db.php');
require_once('../class/user.php');
require_once('header.php'); 
?>

    <main class="main_content">
        <form action="" method="POST">
        <div id = "register_content">
            <label for="login">Login</label>
            <input type="text" name="login">

            <label for="email">E-Mail</label>
            <input type="email" name="email">

            <label for="password" name="password">Mot de Passe</label>
            <input type="password" name="password">

            <label for="confirmPW">Confirmez votre mot de passe</label>
            <input type="password" name="confirmPW">

            <input type="submit" name="register" value="go!">
        </div>
        </form>
    </main>
</body>
</html>