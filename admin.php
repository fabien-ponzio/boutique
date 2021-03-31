<?php


require 'traitement/traitement-admin.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admine</title>
</head>
<body>

<header>
</header>
<main>
<?php
if(isset($_SESSION["succes"])){
    echo $_SESSION ["succes"];
    
}

if(isset($_SESSION["erreur"])){
    echo $_SESSION ["erreur"];
}

?>
    <form action=traitement/traitement-ajout-article.php method="POST">




        <div class="form-group">
            <label for="nom">Nom article</label>
            <input type="text"id="nom" name="nom">
        </div>
   
        <div>
            <label for="prix">prix de article</label>
            <input type="text"id="prix" name="prix">

        </div>
        <div>
            <label for="categorie">choisir une categorie</label>
            <select name="categorie" id="categorie">
                <option value="">choisir une categorie</option>
                <?php for($i=0; $i<count($categories); $i++ ):?>
                <option value="<?=$categories[$i]["id_categorie"]?>"><?=$categories[$i]["nom_categorie"]?></option>
                 <?php endfor ;?>
            </select>

        </div>
        <div>
            <label for="souscategorie">souscategorie</label>
            <select name="souscategorie" id="souscategorie">
                    <option value="">choisir une sous categorie</option>
                    <?php for($i=0; $i<count($sscategories);$i++): ?>
                    <option value="<?=$sscategories[$i]["id_sscategorie"]?>"><?=$sscategories[$i]["nom"]?></option>
                    <?php endfor ;?>
            </select>
            <label for="taille">taille</label>
            <select name="taille" id="taille">
                    <option value="">choisir ca taille</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
            </select>
                <label for="couleur">couleur</label>
                    <select name="couleur" id="couleur">
                        <option value="">choisir la couleur</option>
                        <?php for($i=0;$i<count($color);$i++): ?>
                        <option value="<?=$color[$i]["id_color"]?>"><?=$color[$i]["color_name"]?></option>
                         <?php endfor ;?>
                    </select>
        </div>
        <div>
             <input class="btn btn-default" type="submit" value="Envoyer" />
    
        </div>
    </form>

</main>
<footer>
</footer>
<?php
    unset($_SESSION["erreur"],$_SESSION["succes"]);
?>
    
</body>
</html>