<?php
require '../db.php';

$database=connect();
//execution de la requette
$id=$_GET['id'];

$request=$database->prepare("DELETE FROM `articles` WHERE id_article=$id");
$request->execute();

header('location: ../articles.php');
