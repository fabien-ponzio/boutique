<?php   



if (!empty($_POST['montant']) && is_numeric($_POST['montant'])) {
    
     // Nous appelons l'autoloader pour avoir accès à Stripe
     require_once('vendor/autoload.php');

      // Nous instancions Stripe en indiquand la clé privée, pour prouver que nous sommes bien à l'origine de cette demande
      \Stripe\Stripe::setApiKey('sk_test_51IaP7VFkHd1L3dsMbJOEVFx7WvqjNKDLdsCwv9JZkfKLAjEFqboQnxLH6qRe6xsZ4zvl6gWUZDAQi9Zxd5XRcIr400m3IOe50t');

      // Nous créons l'intention de paiement et stockons la réponse dans la variable $intent
    $intent = \Stripe\PaymentIntent::create([
        'amount' => $_POST['montant']*100, // Le prix doit être transmis en centimes
        'currency' => 'eur',
    ]);
}


//instencier l ojebjet stripe




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://js.stripe.com/v3/"></script>
    <!-- <script src="js/scripts_paiement.js"></script> -->
    <title>payement
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<header>
<?php
    $page = "admin";
    //PATH_PAGES
    $path_index="index.php"; 
    $path_LOGO ="./image/logobb-bleu.png";

    $path_inscription = "pages/inscription.php"; 
    $path_connexion = "pages/connexion.php";
    $path_info ="pages/infoUser.php"; 
    $path_profil ="pages/profif.php"; 
    $path_cart = "pages/cart.php"; 
    $path_items = "pages/items.php";  
    $path_categories="categories.php"; 
    $path_souscategories="pages/souscategories.php";
        require 'pages/header.php';
    ?>

</header>

<main class="container">
<h1 class="text-center">Passer la commande</h1>


    <form method="post">
        <div id="errors"></div>
        <Label>Nom de la carte bleu</Label>
        <input  class="form-control"  id="cardholder-name" type="text" placeholder="Titulaire de la carte">
        <div id="card-element">
        </div>
        <div id="card-errors" role="alert"></div>
        <button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Valider le paiement</button>

    </form>

</main>
<footer>

</footer>

<script src="js/scripts.js"></script>
    
</body>
</html>