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
        <div>
        <form action="" method="POST">

            <label for="login">login</label>
            <input type="text" name="login">
            <label for="email">email</label>
            <input type="email" name="email">
            <label for="password" name="password">mdp</label>
            <input type="password" name="password">
            <label for="confirmPW">Confirm</label>
            <input type="password" name="confirmPW">
            <input type="submit" name="register" value="go!">
        </form>
        </div>
    </main>
</body>
</html>