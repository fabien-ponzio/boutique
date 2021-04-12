<?php 
// PATH PAGES 
$path_index ="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_info ="infoUser.php"; 
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="items.php";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php";

require_once('../class/user.php');
$page="Infos";
require_once('header.php'); 
$user = new User(); 
$infoUser = $user->InfoUser($_SESSION['utilisateur']['id_utilisateurs']); 
var_dump($infoUser); 
?>
<body>
<link rel="stylesheet" href="../CSS/infoUser.css">

<main class="wrapper_categories">
    <h1>Mes infos personnelles</h1>
    <section class="wrapper_item">
    <?php 
    foreach($infoUser as $info){?>
    <article class="displayItems">

    <p><?= $info['login']?></p>
    <p><?= $info['email']?></p>
    <p><?= $info['nom']?></p>
    <p><?= $info['prenom']?></p>
    <p><?= $info['pays']?></p>
    <p><?= $info['ville']?></p>
    <p><?= $info['code_postal']?></p>
    <p><?= $info['rue']?></p>
    <p><?= $info['numero']?></p>

    </article>
    <?php
}
?>
<a href="<?=$path_profil?>">Modifier mes infos</a>
    </section>
</main>
</body>
