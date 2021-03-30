<?php   

var_dump($_POST);

if (!empty($_POST['montant']) && is_numeric($_POST['montant'])) {
    echo "ok";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/scripts_paiement.js"></script>
    <title>payement
    </title>
</head>
<body>
<header>

</header>
<main>


    <form method="post">
        <div id="errors"></div>
        <Label>Nom de la carte bleu</Label>
        <input id="cardholder-name" type="text" placeholder="Titulaire de la carte">
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