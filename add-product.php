<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="content">
        <div class="container">
            <form id="product_form" name="form" method="POST" action="submit.php">
                <div class="row mt-3">
                    <div class="col">
                        <h1>Product Add</h1>
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" name="save_product" class="btn btn-primary">Save</button>
                        <a href="/scandi"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </div>
                </div>
                <hr>
                <div id="message" style="display:none;" class="alert alert-danger" role="alert">Please, submit required data!</div>    
                <div id="message2" style="display:none;" class="alert alert-danger" role="alert">Please, provide data of indicated type!</div>         
                <div id="message"></div>
                <div class="mb-3 row">
                    <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="sku" name="sku">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" min="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="productType" class="col-sm-2 col-form-label">Type Switcher</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="productType" name="productType" onchange="typeFunction()">
                            <option selected disabled>Type Switcher</option>
                            <option id="DVD" value="dvd">DVD</option>
                            <option id="Furniture" value="furniture">Furniture</option>
                            <option id="Book" value="book">Book</option>
                        </select>
                    </div>
                </div>
                <div id="show_dvd" style="display:none;">
                    <div class="mb-3 row">
                        <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="size" name="size">
                        </div>
                        <p class="mt-3"><strong>Please provide size in MB</strong></p>
                    </div>
                </div>
                <div id="show_book" style="display:none;">
                    <div class="mb-3 row">
                        <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="weight" name="weight">
                        </div>
                        <p class="mt-3"><strong>Please provide weight in KG</strong></p>
                    </div>
                </div>
                <div id="show_furniture" style="display:none;">
                    <div class="mb-3 row">
                        <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="height" name="height">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="width" name="width">
                        </div>
                    </div> 
                    <div class="mb-3 row">
                        <label for="length" class="col-sm-2 col-form-label">Lenght (CM)</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="length" name="lenght">
                        </div>
                        <p class="mt-3"><strong>Please provide dimensions in HxWxL</strong></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script>
function typeFunction() {
    var x = document.getElementById("productType");
    var i = x.selectedIndex;
    if (x.options[i].text === 'DVD') {
        document.getElementById("show_dvd").style.display = "initial";
    }else {
        document.getElementById("show_dvd").style.display = "none";
    }

    if (x.options[i].text === 'Book') {
        document.getElementById("show_book").style.display = "initial";
    }else {
        document.getElementById("show_book").style.display = "none";
    }

    if (x.options[i].text === 'Furniture') {
        document.getElementById("show_furniture").style.display = "initial";
    }else {
        document.getElementById("show_furniture").style.display = "none";
    }
}

document.getElementById("product_form").addEventListener("submit", function(e) {
    if (this.sku.value.trim() == "" || this.name.value.trim() == "" || this.productType.value.trim() == "" || this.price.value.trim() == "") {
        document.getElementById("message").style.display = 'block';
        e.preventDefault();
    }else {
        document.getElementById("message").style.display = 'none';
    }

    var x = document.getElementById("productType");
    var i = x.selectedIndex;
    if (x.options[i].text === 'DVD' && this.size.value.trim() == "") {
        document.getElementById("message").style.display = 'block';
        e.preventDefault();
    }else if (x.options[i].text === 'Book' && this.weight.value.trim() == "") {
        document.getElementById("message").style.display = 'block';
        e.preventDefault();
    }else if (x.options[i].text === 'Furniture') {
        if (this.height.value.trim() == "" || this.width.value.trim() == "" || this.length.value.trim() == "") {
            document.getElementById("message").style.display = 'block';
            e.preventDefault();
        }
    }else if (!x.selectedIndex) {
        document.getElementById("message").style.display = 'block';
        e.preventDefault();
    }else {
        document.getElementById("message").style.display = 'none';
    }

    if (!/^[0-9]+$/.test(this.price.value) || !/^[0-9]+$/.test(this.size.value) || !/^[0-9]+$/.test(this.weight.value) || !/^[0-9]+$/.test(this.width.value) || !/^[0-9]+$/.test(this.height.value) || !/^[0-9]+$/.test(this.length.value)) {
        document.getElementById("message2").style.display = 'block';
    }else {
        document.getElementById("message2").style.display = 'none';
    }
});  
</script>

</body>
</html>
