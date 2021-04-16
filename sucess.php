<?php session_start();

    unset($_SESSION['panier']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Stripe Checkout Sample</title>
    <meta name="description" content="A demo of Stripe client-only Checkout" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/global.css" />
    <script src="https://js.stripe.com/v3/"></script>
  </head>

  <body>
    <div class="sr-root">
      <div class="sr-main">
        <header class="sr-header">
        </header>
        <div class="sr-payment-summary completed-view">
          <h1>Merci pour votre commande</h1>
          <h4> <span id="session"> <a href="index.php">Retour à la boutique</a></span></h4>
        </div>
      <div class="sr-content">
        <div class="pasha-image-stack">
          <img
            src="image/amiricargo.jpg"
            width="140"
            height="160"
          />
          <img
            src="image/eaglesnfl.jpg"
            width="140"
            height="160"
          />
          <img
            src="image/indianajones.jpg"
            width="140"
            height="160"
          />
          <img
            src="image/jean1.png"
            width="140"
            height="160"
          />
        </div>
      </div>
    </div>
    <script>
      var urlParams = new URLSearchParams(window.location.search);

      if (urlParams.has("session_id")) {
        document.getElementById("session").textContent = urlParams.get(
          "session_id"
        );
      }
    </script>
  </body>
</html>