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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>article</title>
</head>
<body>
<header>
</header>

<main class="container">

        
    <table class="table table-bordered">
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
                <td> <button class="btn btn-warning"><a href="modif.article.php?id=<?= $article[$i]["id_article"]?>">modifier</a></button></td>
                <td> <button class="btn btn-danger"><a href="traitement/suprimer-article.php?id=<?=$article[$i]["id_article"]?>">supprimer</a> </button> </td>
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