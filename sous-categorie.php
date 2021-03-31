<?php
require 'traitement/traitement.categorie.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>souscategorie</title>
</head>
<body>
<header>

</header>
<main>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>sous-categorie</th>
                <th>supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i=0;$i<count($resultat3);$i++ ):?>
            <tr>
                <td><?=  $resultat3[$i]['nom']; ?></td>
                <td><button class="btn btn-default"><a href="traitement/supprimer-sscategorie.php?id=<?=$resultat3[$i]["id_sscategorie"]?>">supprimer</a></button></td>
            </tr>
            <?php endfor;?>
        </tbody>

    </table>
    <form action="traitement/ajouter-sscategorie.php"method="POST">
    <div>
    
        <select name="categorie" id="">
            <?php for ($i=0;$i <count($resultat);$i++):   ?>
            <option value="<?=$resultat[$i]["id_categorie"] ?>"><?=$resultat[$i]["nom_categorie"]?></option>
            <?php endfor; ?>

        </select>
        </div>
        <div>
        <label for="">nom de la souscategorie</label>
        <input type="text"name="nom">
        <input class="btn btn-default" type="submit"value="Enregistrer">
        </div>
    </form>


</main>
<footer>

</footer>
    
</body>
</html>