<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../config/database.php';
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);
$id = $_GET['id'];

$result = $product->read_one($id);
$num = $result->num_rows;

// check if more than 0 record found
if($num>0){

   // products array
   $products_arr=array();

   // product data ophalen
   while ($row = $result->fetch_assoc()){
       // extract row
       // this will make $row['name'] to
       // just $name only
       extract($row);

       $product_item=array(
           "id" => $id,
           "naam" => $naam,
           "beschrijving" => html_entity_decode($beschrijving),
           "prijs" => $prijs
       );

       array_push($products_arr, $product_item);
   }
}
var_dump($products_arr);




?>
