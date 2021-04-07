<?php
require_once('../functions/db.php'); 
//PATH_PAGES
$path_index="../index.php"; 
$path_inscription = "inscription.php"; 
$path_connexion = "connexion.php";
$path_profil ="profil.php"; 
$path_cart = "cart.php"; 
$path_items ="";  
$path_categories="categories.php"; 
$path_souscategories="souscategories.php";
require_once('header.php'); 
class Match
{
    public $db; 

    public function __construct()
    {
        $this->db = Connect(); 
    }
}