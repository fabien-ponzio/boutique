<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
$database = ("db.php");
require_once('db.php');
require_once('user.php');

    if (isset($_POST['register'])) {
        $user = new User(); 
        $user->register($_POST['login'],$_POST['email'],$_POST['password'],$_POST['confirmPW']); 
        $_SESSION['user']=$user; 
    }
// TRAITER LA FONCTION REGISTER DE NOTRE CLASS USER ICI 
?>
    <main>
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
    </main>
</body>
</html>