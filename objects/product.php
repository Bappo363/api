<?php
class Product
{

   // database connectie en tabel-naam
   private $conn;
   private $table_name = "product";

   // object properties
   public $id;

   // constructor with $db as database connection
   public function __construct($db)
   {
       $this->conn = $db;
   }

   // read products
   function read()
   {

       // select all query
       $query = "SELECT * FROM " . $this->table_name;

       $result = $this->conn->query($query);

       return $result;
   }

   function read_one($id)
   {

       // select all query
       $query = "SELECT * FROM " . $this->table_name . " where id = $id";

       $result = $this->conn->query($query);

       return $result;
   }



function delete($id)
{

    // select all query

    $query = "DELETE  FROM " . $this->table_name . " where id = $id";

    $result = $this->conn->query($query);
    var_dump($query);

}

function create($db, $id, $naam, $description, $prijs, $categorie)
{

     //INSERT INTO `product` (`id`, `naam`, `beschrijving`, `prijs`, `categorie_id`) VALUES ($id, '$naam', '$description', '$prijs', '$categorie');


    $query = "INSERT INTO `product` (`id`, `naam`, `beschrijving`, `prijs`, `categorie_id`) VALUES ($id, '$naam', '$description', '$prijs', '$categorie')";

    $result = $this->conn->query($query);
    var_dump($result);

}

function edit($db, $id, $naam, $description, $prijs, $categorie)
{

    $query = "
    UPDATE `product`
    SET `naam`='$naam', `beschrijving`='$description', `prijs`='$prijs', `categorie_id`='$categorie';
    WHERE `id`='$id'
    ";

    $result = $this->conn->query($query);
    var_dump($result);

}

}
