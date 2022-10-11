<?php
session_start();

include('config/database.php');
include('app/Controllers/ProductController.php');

$db = new DatabaseConnection;

if(isset($_POST['save_product']))
{
    $inputData = [
        'sku' => mysqli_real_escape_string($db->conn,$_POST['sku']),
        'name' => mysqli_real_escape_string($db->conn,$_POST['name']),
        'price' => mysqli_real_escape_string($db->conn,$_POST['price']),
        'type' => mysqli_real_escape_string($db->conn,$_POST['productType']),
        'size'=> mysqli_real_escape_string($db->conn,$_POST['size']),
        'weight'=> mysqli_real_escape_string($db->conn,$_POST['weight']),
        'height'=> mysqli_real_escape_string($db->conn,$_POST['height']),
        'width'=> mysqli_real_escape_string($db->conn,$_POST['width']),
        'lenght'=> mysqli_real_escape_string($db->conn,$_POST['lenght']),
    ];

    $product = new ProductController;
    $result = $product->create($inputData);
    
    if($result)
    {
        header("Location: index.php");
        exit(0);
    }
    else
    {
        header("Location: add-product.php");
        exit(0);
    }
}
?>