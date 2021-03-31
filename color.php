<?php 
require "traitement/traitement-admin.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>color</title>
</head>
<body>
<header>

</header>
    <main>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<count($color);$i++) :?>
                <tr>
                    <td><?= $color[$i]["color_name"]?></td>
                    <td><button C><a href="traitement/supprimer.color.php?id=<?=$color[$i]["id_color"]?>">Supprimer</a></button></td>
                </tr>
                <?php endfor;?>
            </tbody>
        </table>
    <?php

    if(isset($_SESSION["erreur"])){
        echo $_SESSION["erreur"];
    }
    if(isset($_SESSION["succes"])){
        echo $_SESSION["succes"];

    }

    ?>


    <form action="traitement/traitement-ajoutcolors.php"method="POST">
        <div>
            <label for="ajout">ajout de couleur</label>
            <input type="text"name="color">
            <input class="btn btn-primary" type="submit">
        </div>
    </form>

</main>
<footer>


</footer>
<?php unset($_SESSION["erreur"],$_SESSION["succes"]) ?>
    
</body>
</html>