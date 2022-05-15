<?php
require_once("functions.php");
$id=$_GET["id"];
addProdToPanier($id);
header("location:Boutique.php");
?>