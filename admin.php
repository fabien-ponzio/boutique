<?php

require 'traitement/traitement-admin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admine</title>
</head>
<body>

<header>
</header>
<main>
<form action="/traitement-admin.php" method="post">
    <div>
        <label for="nom">Nom article</label>
        <input type="text"id="nom" name="nom">
    </div>
    <div>
    
        <label for="description">description de article</label>
        <textarea name="desciption" id="descripion" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="prix">prix de article</label>
        <input type="text"id="prix" name="prix">

    </div>
    <label for="categorie">choisir une categorie</label>
    <select name="categorie" id="categorie">
        <option value="">choisir une categorie</option>
        <?php for($i=0; $i<count($categories); $i++ ):?>
        <option value="<?=$categories[$i]["id_categorie"]?>"><?=$categories[$i]["nom"]?></option>
        <?php endfor ;?>
    </select>
      
    

    <div>
    
        
    
    




        
        
    
</form>

</main>
<footer>
</footer>
    
</body>
</html>