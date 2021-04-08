<?php
//REQUIRE DES CLASS
if($page=="Accueil"){
require_once('functions/db.php'); 
require_once('categories.php');
require_once('panier.php'); 
require_once('class/user.php');
}else{
require_once('../functions/db.php'); 
require_once('../class/categories.php');
require_once('../class/panier.php'); 
require_once('../class/user.php');
}
?>