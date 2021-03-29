<?php 
require_once('header.php'); 
var_dump($_SESSION);
    var_dump($_SESSION['panier']); 
    // array keys(fonction php qui permet de récuper les index du tableau session) nous permet de récuperer les index de le session panier 

    $ids = array_keys($_SESSION['panier']);
    if (empty($ids)) {
        //il ny'a rien dans le panier donc le tableau est vide
        $products=array(); 
    }else {
        $products = $db->prepare('SELECT * FROM articles AS A INNER JOIN image_article AS I ON A.id_article = I.id_article WHERE A.id_article IN ('.implode(',',$ids).')');
        var_dump($products);  
        $products -> execute(); 
        $selectInfos = $products->fetchAll(PDO::FETCH_OBJ); 
        var_dump($selectInfos); 
    }

?>

<body>
    <main id="register_content">
        <section id="panier">
            <form action="cart.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>article</td>
                            <th>titre</td>
                            <th>prix unité</td>
                            <th>quantité</td>
                            <th>modifier</td>
                            <th>sous-total</td>
                            <th id="supp">SUPP</td>
                        </tr>
                    </thead>
    <?php
    if(empty($ids)){
        $selectInfos = array();
    } else{

   
        foreach ($selectInfos as $infos) {?>
            <tbody>
                <tr>
                    <td>
                    <img src="../<?= $infos->chemin_image ?>" height="100">
                    </td>
                    <td><?= $infos->nom ?></td>
                    <td><?= $infos->prix ?>&nbsp eu</td>
                    <td><?= $_SESSION['panier'][$infos->id_article] ?></td>
                    <td><input type="text" name="panier[quantity][<?= $infos->id_article;?>]" value="<?= $_SESSION['panier'][$infos->id_article];?>"></td>
                    <td>
                    <input id="recalc" name="recalc" type="submit" value="Recalculer"> > 
                    </td>
                    <td>
                        <?php 
                        $sub_total = $panier->recalc(); 
                        $sub_total = $panier->sub_total($infos->prix, $_SESSION['panier'][$infos->id_article]);?>
                        <?= $sub_total ?>
                    </td>
                    <td><a href="cart.php?delPanier=<?= $infos->id_article; ?>" class="del">X</td>
                </tr>
            </tbody>
    <?php
        }
    ?>
        <span>Prix total = <?= $panier ->total() ?> Euros</span>
    <?php
    }
    ?>
    </table>
    </form>
    </section>
    </main>
</body>

<?php require_once('footer.php'); ?>