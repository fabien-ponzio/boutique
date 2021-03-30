<?php
require 'db.php';
$database=connect();
//execution de la requette
$requette=$database->prepare("SELECT * FROM `articles`");
$requette->execute();
$article=$requette->fetchAll(PDO::FETCH_ASSOC);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
</head>
<body>
<header>
</header>

<main>

        
    <table>
        <thead>
            <tr>
                <th>article</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td>nom de article</td>
                <td>prix</td>
                <td>modifier</td>
                <td>suprimer</td>
            </tr>
            <?php
                for($i=0;$i<count($article); $i++):?>
             <tr>
                <td><?php echo $article[$i]["nom"]?></td>
                <td><?php echo $article[$i]["prix"]?></td>
                <td> <button><a href="modif.article.php?id=<?= $article[$i]["id_article"]?>">modifier</a></button></td>
                <td> <button><a href="traitement/suprimer-article.php?id=<?=$article[$i]["id_article"]?>">supprimer</a> supprimer</button> </td>
                <td> </td>
            </tr>
            <?php endfor;?>

    

        </tbody>

    </table>



</main>

<footer>

</footer>
    
</body>
</html>