<?php 
$database = ('../functions/db.php');
require_once('../functions/db.php');
require_once('../class/user.php');
require_once('header.php'); 
?>

<?php 
if (isset($_POST["connect"])) {
    $user = new User(); 
    $user->connectUser($_POST['login'], $_POST['password']); 
}
?>

<main>
    <form action="" method="POST">
        <?php var_dump($_SESSION);  ?>
        <label for="login">login</label>
        <input type="text" name="login">

        <label for="password" name="password">password</label>
        <input type="password" name="password">

        <input type="submit" name="connect" value="go!">
        
    </form>
</main>