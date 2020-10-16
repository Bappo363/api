<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();
$id = $_GET['id'];
$naam = $_GET['naam'];
$description = $_GET['description'];
$prijs = $_GET['prijs'];
$categorie = $_GET['categorie'];
$product = new Product($db);

$product->edit($db, $id, $naam, $description, $prijs, $categorie);

 ?>
