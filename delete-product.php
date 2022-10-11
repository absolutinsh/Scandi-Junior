<?php
session_start();

include('config/database.php');
include_once('app/Controllers/ProductController.php');

$db = new DatabaseConnection;

if(isset($_POST['deleteProduct']))
{
    $products = $_POST['deleteProduct'];

    foreach ($products as $id) {
        $productDeleteQuery = "DELETE FROM products WHERE id=".$id;
        $result = $db->conn->query($productDeleteQuery);
    }    

    header("Location: index.php");
    exit(0);
}
?>