<?php

class ProductController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function getData() 
    {
        $productQuery = "SELECT * FROM products";
        $result = $this->conn->query($productQuery);
        if ($result->num_rows > 0) {
            return $result;
        }else {
            return false;
        }
    }

    public function create($inputData) 
    {
        $sku = $inputData['sku'];
        $name = $inputData['name'];
        $price = $inputData['price'];
        $type = $inputData['type'];
        $size = $inputData['size'];
        $weight = $inputData['weight'];
        $height = $inputData['height'];
        $width = $inputData['width'];
        $lenght = $inputData['lenght'];

        if ($type === 'dvd') {
            $value = "Size: ".$size." mb";
        }elseif ($type === 'furniture') {
            $value = "Dimensions: ".$height."x".$width."x".$lenght." cm";
        }elseif ($type === 'book') {
            $value = "Weight: ".$weight." kg";
        }

        $productQuery = "INSERT INTO products (sku, name, price, value) VALUES ('$sku','$name','$price','$value')";
        $result = $this->conn->query($productQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>