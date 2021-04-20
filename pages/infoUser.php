
<?php 
// PATH PAGES 
$path_index ="../index.php"; 
$path_LOGO ="../image/logobb-bleu.png"; 
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
// var_dump($infoUser); 
?>
<body>
<link rel="stylesheet" href="../CSS/infoUser.css">

<main class="wrapper_userInfo">
    <h1>Mes infos personnelles</h1>
    <section class="wrapper_info">
    <?php 
    foreach($infoUser as $info){?>
    <article class="displayItems">

    <div class="userInfo">
    <p class="User">Login:   </p>
    <p class="echo"><?= $info['login']?></p>
    </div>

    <div class="userInfo">
    <p class="User">E-mail:   </p>
    <p class="echo"><?= $info['email']?></p>
    </div>

    <div class="userInfo">
    <p class="User">Nom:   </p>
    <p class="echo"><?= $info['nom']?></p>
    </div>

    <div class="userInfo">
    <p class="User">Prénom:   </p>
    <p class="echo"><?= $info['prenom']?></p>
    </div>

    <div class="userInfo">
    <p class="User">Pays:   </p>
    <p class="echo"><?= $info['pays']?></p>
    </div>

    <div class="userInfo">
    <p class="User">Ville:   </p>
    <p class="echo"><?= $info['ville']?></p>
    </div>

    <div class="userInfo">
    <p class="User">Code postal:   </p>
    <p class="echo"><?= $info['code_postal']?></p>
    </div>

    <div class="userInfo">
    <p class="User">Nom de la voie:   </p>
    <p class="echo"><?= $info['rue']?></p>
    </div>

    <div class="userInfo">
    <p class="User">Numéro de voie:   </p>
    <p class="echo"><?= $info['numero']?></p>
    </div>

    </article>
    <?php
}
?>
<a href="<?=$path_profil?>" class="linkUpdate">Modifier mes infos</a>
    </section>
</main>
</body>
