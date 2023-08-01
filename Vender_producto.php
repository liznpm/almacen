<?php
include "db_conn.php";
include 'nav.php';

// Comprobar si se proporciona el parámetro 'id' en la URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Obtener los detalles del producto desde la base de datos
    $sql = "SELECT * FROM `productos` WHERE `id` = $productId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "<p>No se encontró el producto con ID '$productId'.</p>";
        exit;
    }
} else {
    echo "<p>Identificador de producto no proporcionado.</p>";
    exit;
}

// Verificar si se envió el formulario de venta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del producto a vender
    $product_name = $product['product_name'];
    $description = $product['description'];
    $price = $product['price'];
    $category = $product['category'];
    $cantidad_disponible = $_POST['cantidad_disponible'];
    $precio_unitario = $_POST['precio_unitario'];
    $fecha = $_POST['fecha'];
    $proveedor_id = $_POST['proveedor_id'];

    // Eliminar el producto de la base de datos "productos"
    $sql_delete = "DELETE FROM `productos` WHERE `id` = $productId";
    mysqli_query($conn, $sql_delete);

    // Insertar el producto en la base de datos "ventas"
    $sql_insert = "INSERT INTO `ventas` (product_name, description, price, category, cantidad_disponible, precio_unitario, fecha, proveedor_id) 
                   VALUES ('$product_name', '$description', '$price', '$category', '$cantidad_disponible', '$precio_unitario', '$fecha', '$proveedor_id')";
    mysqli_query($conn, $sql_insert);

    // Redirigir a otra página o mostrar un mensaje de éxito, dependiendo de tus necesidades
    // Por ejemplo, puedes redirigir a la página de ventas con header("Location: ventas.php");
    echo "<p>¡El producto se ha vendido con éxito!</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Vender Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">
        <h1 class="mb-4">Vender Producto</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                <p class="card-text"><?php echo $product['description']; ?></p>
                <p class="card-text">Precio: $<?php echo $product['price']; ?></p>
                <p class="card-text">Categoría: <?php echo $product['category']; ?></p>

                <!-- Formulario para vender el producto -->
                <form method="post">
                    <!-- Campos ocultos para enviar los detalles del producto -->
                    <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">
                    <input type="hidden" name="description" value="<?php echo $product['description']; ?>">
                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                    <input type="hidden" name="category" value="<?php echo $product['category']; ?>">
                    
                    <!-- Agrega tus campos de formulario para la venta -->
                    <!-- Por ejemplo, cantidad, información del comprador, etc. -->
                    <div class="form-group">
                        <label for="cantidad_disponible">Cantidad disponible:</label>
                        <input type="number" class="form-control" name="cantidad_disponible" required>
                    </div>
                    <div class="form-group">
                        <label for="precio_unitario">Precio unitario:</label>
                        <input type="number" class="form-control" name="precio_unitario" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" name="fecha" required>
                    </div>
                  

                    <button type="submit" class="btn btn-primary">Vender Producto</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

