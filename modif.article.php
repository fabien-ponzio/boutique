<?php
require "traitement/traitement.categorie.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modification article</title>
</head>
<body>
<header>

</header>
<main>
    <form action="traitement/traitement-modif-article.php?id=<?= $_GET["id"]?>"method="POST">
        <div class="form-group">
            <label for="article">non de article</label>
            <input type="text"id="article"name="nom">


        </div>
    

        <div>
            <label for="modifiertaille">modifier la taille</label>
            <select name="taille" id="modifier la  taille">
                <option value="choisie la taille"></option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>

        </div>
         <div>
            <label for="modifier le prix">modifier le prix</label>
            <input type="text"id="prix"name="prix">
        </div>
         <div>
            <label for="modifier la couleur">modifier la couleur</label>
            <select name="couleur" id="modifier la couleur">
                <option value="choisie la couleur"></option>
                <?php for($i=0;$i<count($resultat2);$i++): ?> 
                <option value="<?= $resultat2[$i]["id_color"]?>"><?= $resultat2[$i]["color_name"]?></option>
                <?php endfor; ?>

            </select>
        </div>
        <div>
            <label for="categorie">modifier la categorie</label>
            <select name="categorie" id="categorie">
            <?php for($i=0;$i<count($resultat);$i++):?>
                <option value="<?=$resultat[$i]['id_categorie'] ?>"><?= $resultat[$i]["nom_categorie"]?></option>
            <?php endfor;?>

            </select>

        </div>
        <div>

            <label for="souscategorie">modifier la sous categorie</label>
            <select name="souscategorie" id="souscategorie">
                <?php for($i=0;$i<count($resultat3);$i++):?>
                <option value="<?=$resultat3[$i]["id_sscategorie"]?>"><?=$resultat3[$i]["nom"]?></option>
                <?php endfor;?>

            </select>
        </div>        
        <input class="btn btn-default" type="submit" value="Envoyer" />

    </form>
    
</main>
<footer>


</footer>
    
</body>
</html>