<?php 
require_once('functions/db.php'); 

 class Panier {
     public $db;

    public function __construct()
    {
        $this->db = Connect(); 
        if (!isset($_SESSION)) {
            session_start(); 
        }

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array(); 
        }

        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']); 
        }

        if(isset($_GET['panier']['quantity'])){
            $this->recalc(); 
        }
    }

    public function recalc(){
        // $prixfinal=0;
        // var_dump($_SESSION['panier']); 
        foreach($_SESSION['panier'] as $product_id => $quantity){
            if(isset($_POST['panier']['quantity'][$product_id])){
                $_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id]; 
                // $prixfinal = $_SESSION['prix'] * $_SESSION['quantity']; 
            }
        }
    }

    public function count(){
        // compte le nombre d'articles par
        return array_sum($_SESSION['panier']); 
    }

    public function total(){
        $total = 0; 
    //grâce à la fonction array keys on récupère les clés présentes dans le panier soit les ids des articles
    $ids = array_keys($_SESSION['panier']); 
        if(empty($ids)){
            $products = array(); 
        }else{
            $products = $this->db->query('SELECT id_article, prix FROM articles WHERE id_article IN ('.implode(',',$ids).')'); 
            $products -> execute(); 
            $prod = $products->fetchAll(PDO::FETCH_OBJ); 
        }
        foreach ($prod as $product) {
            $total += $product->prix * $_SESSION['panier'][$product->id_article]; 
        }
        return $total; 
    }

    public function add($product_id){
        // ajout des articles dans le panier
        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id] ++;
            // si le produit est déjà présent dans le panier on incrémente
        }else {
            $_SESSION['panier'][$product_id]=1; 
            // sinon on ajoute simplement un article dans le panier grâce à son id
        }
    }


    public function del($product_id){
        // unset de panier
        unset($_SESSION['panier'][$product_id]); 
    }

    public function sub_total($prix_product, $nb_product){
        $calcul = $prix_product * $nb_product; 
        return $calcul; 
    }

    public function getProducts ($id_article){
        $getProducts = $this->db->prepare("SELECT id_article, id_color FROM articles WHERE id_article = $id_article"); 
        $getProducts->execute();
        $fetch = $getProducts->fetchAll(PDO::FETCH_OBJ); 
        return $fetch; 
    }
}
 
?>