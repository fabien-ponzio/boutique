<?php
//REQUIRE DES CLASS
if($page=="Accueil"){
require_once('categories.php');
require_once('panier.php'); 
require_once('class/user.php');
require_once('chemins_class.php');
}else{
require_once('../class/chemins_class.php'); 
require_once('../class/categories.php');
require_once('../class/panier.php'); 
require_once('../class/user.php');
}
?>