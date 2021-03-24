<?php 
$database = ('../functions/db.php');
require_once('../functions/db.php');
require_once('../class/user.php');
require_once('header.php'); 

if (isset($_POST["connect"])) {
    $user = new User(); 
    $user->connectUser($_POST['login'], $_POST['password']); 
}
?>


<main class="main_content">
    <div>
    <form action="" method="POST">
        <label for="login">login</label>
        <input type="text" name="login">

        <label for="password" name="password">password</label>
        <input type="password" name="password">

        <input type="submit" name="connect" value="go!">
    </form>
    </div>
</main>