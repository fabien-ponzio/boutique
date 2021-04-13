<?php 
// PATH PAGES 
$path_index ="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_info ="infoUser.php"; 
$path_profil ="profil.php"; 
$path_cart = ""; 
$path_items ="items.php";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php";
$page="Panier";
require_once('header.php'); 
$basket = new Panier(); 
// $id_panier = $_GET['id']; 

    // array keys(fonction php qui permet de récuper les index du tableau session) nous permet de récuperer les index de le session panier 

    $ids = array_keys($_SESSION['panier']);
    if (empty($ids)) {
        //il n y'a rien dans le panier donc le tableau est vide
        $products=array(); 
    }else {
        $products = $db->prepare('SELECT * FROM articles AS A INNER JOIN image_article AS I ON A.id_article = I.id_article WHERE A.id_article IN ('.implode(',',$ids).')');
        $products -> execute(); 
        $selectInfos = $products->fetchAll(PDO::FETCH_OBJ); 
    }
?>
<link rel="stylesheet" href="../CSS/cart.css">
<body>
    <main>
        <h1>Votre panier</h1>
        <section id="panier">
            <form action="cart.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Article</td>
                            <th>Nom</td>
                            <th>Prix Unitaire</td>
                            <th>Quantité</td>
                            <th>Nombre d'Articles</td>
                            <th>Sous-Total</td>
                            <th id="supp">SUPP</td>
                        </tr>
                    </thead>
    <?php
    if(empty($ids)){
        $selectInfos = array();
    }else{
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
                    <input id="recalc" name="recalc" type="submit" value="Recalculer"> 
                    </td>
                    <td>
                        <?php 
                        $sub_total = $panier->recalc(); 
                        $sub_total = $panier->sub_total($infos->prix, $_SESSION['panier'][$infos->id_article]);?>
                        <?= $sub_total ?>
                    </td>
                    <td><a href="<?=$path_cart?>?delPanier=<?= $infos->id_article; ?>" class="del">X</td>
                </tr>
            </tbody>
    <?php
        }
    ?>
        <span id="prixtotal">Prix total = <?= $panier ->total() ?>€</span>
    <?php
    }
    ?>
    </table>
    </form>
    </section>

    <form action="../payement.php" method="POST" class="paiement">
        <input type="hidden" name="montant" value="<?= $panier->sub_total($infos->prix, $_SESSION['panier'][$infos->id_article]) ?>">
        <input id="validerpanier" type="submit" value="Payer">
    </form>
    </main>
</body>

