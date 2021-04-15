<?php 

$id=$_GET["id"];

require '../functions/db.php';

$database=connect();
$requette=$database->prepare("DELETE FROM `color` WHERE `id_color`=$id");
$requette->execute();

header("location: ../color.php");





?>