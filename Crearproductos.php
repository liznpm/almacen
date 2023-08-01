<?php
include "db_conn.php";
include "nav.php";

function getProveedores($conn) {
    $sql = "SELECT * FROM proveedores";
    $result = mysqli_query($conn, $sql);
    return $result;
}

$proveedores = getProveedores($conn);

// Check if the form has been submitted
if (isset($_POST["submit"])) {
    // Retrieve form data
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $cantidad_disponible = $_POST['cantidad_disponible'];
    $precio_unitario = $_POST['precio_unitario'];
    $fecha = $_POST['fecha'];
    $proveedor_id = $_POST['proveedor_id']; // Retrieve the selected provider id

    // Construct the SQL query to insert data into the database table
    $sql = "INSERT INTO `productos`(`id`, `product_name`, `description`, `price`, `category`, `cantidad_disponible`, `precio_unitario`, `fecha`, `proveedor_id`) 
            VALUES (NULL, '$product_name', '$description', '$price', '$category', '$cantidad_disponible', '$precio_unitario', '$fecha', '$proveedor_id')";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        // If the query is successful, redirect the user to another page or show a success message.
        // For example:
        // header("Location: success.php");
        // exit;
        echo "Product added successfully!";
    } else {
        // If there's an error in the query execution, you can handle it accordingly.
        echo "Error: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" rel="stylesheet">


    <title>Product Management</title>
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Product List</h3>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="mb-3">
                    <label class="form-label">Product Name:</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea class="form-control" name="description" placeholder="Product Description" rows="3"></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Price:</label>
                        <input type="number" step="0.01" class="form-control" name="price" placeholder="Price">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Category:</label>
                        <input type="text" class="form-control" name="category" placeholder="Category">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Cantidad Disponible:</label>
                        <input type="number" class="form-control" name="cantidad_disponible" placeholder="Cantidad Disponible">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Precio Unitario:</label>
                        <input type="number" step="0.01" class="form-control" name="precio_unitario" placeholder="Precio Unitario">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Fecha:</label>
                        <input type="date" class="form-control" name="fecha">
                    </div>
                </div>

             
                <div class="mb-3">
                    <label for="proveedor_id" class="form-label">Seleccione un Proveedor:</label>
                    <?php include "get_proveedores.php"; ?>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info me-2" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap y otros scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>