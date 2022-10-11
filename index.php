<?php
include('config/database.php');
include('app/Controllers/ProductController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="content">
        <div class="container">
            <form action="delete-product.php" method="POST">
                <div class="row mt-3">
                    <div class="col">
                        <h1>Product page</h1>
                    </div>
                    <div class="col-md-auto">
                        <a href="add-product"><button type="button" class="btn btn-primary">ADD</button></a>
                        <button type="submit" id="delete-product-btn" class="btn btn-danger">MASS DELETE</button>
                    </div>
                </div>
                <hr>
                <div class="row row-cols-4">
                    <?php
                        $products = new ProductController;
                        $result = $products->getData();
                        if($result) {
                            foreach($result as $col) {
                    ?>
                    <div class="col">
                        <div class="card m-2">
                            <div class="card-body">
                                <div class="form-check">
                                    <input type="checkbox" name="deleteProduct[]" value="<?=$col['id']?>" class="form-check-input delete-checkbox">
                                </div>
                                <div class="card-text text-center"><?=$col['sku']?></div>
                                <div class="card-text text-center"><?=$col['name']?></div>
                                <div class="card-text text-center"><?=$col['price']?> $</div>
                                <div class="card-text text-center"><?=$col['value']?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    }
                    ?>
                </div>
            </form>
            <hr>
            <div class="text-center">Scandiweb Test assignment</div>
        </div>
    </div>
</body>
</html>