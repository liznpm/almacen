<?php
include "db_conn.php";
include 'nav.php';

// Verificar si la conexión a la base de datos se ha realizado correctamente
if (!$conn) {
    echo "Error: No se pudo conectar a la base de datos.";
} else {
    // Verificar si se recibió un ID de producto válido
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Obtener los datos del producto desde la base de datos
        $sql = "SELECT * FROM `productos` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);

        // Verificar si se encontró el producto
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Error: Producto no encontrado.";
            exit;
        }
    } else {
        echo "Error: ID de producto no válido.";
        exit;
    }
}

// Procesar el formulario de actualización
if (isset($_POST["submit"])) {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Consulta de actualización
    $sql_update = "UPDATE `productos` SET `product_name`='$product_name', `description`='$description', `price`='$price', `category`='$category' WHERE `id` = $id";

    // Ejecutar la consulta de actualización
    $result_update = mysqli_query($conn, $sql_update);

    if ($result_update) {
        // Redirigir a la página de productos después de la actualización exitosa
        header("Location: Verproductos.php?msg=Record updated successfully");
        exit;
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... Código del encabezado ... -->
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Product</h3>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="mb-3">
                    <label class="form-label">Product Name:</label>
                    <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea class="form-control" name="description" rows="3" required><?php echo $row['description']; ?></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Price:</label>
                        <input type="number" step="0.01" class="form-control" name="price" value="<?php echo $row['price']; ?>" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Category:</label>
                        <input type="text" class="form-control" name="category" value="<?php echo $row['category']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Cantidad Disponible:</label>
                        <input type="number" class="form-control" name="cantidad_disponible" value="<?php echo $row['cantidad_disponible']; ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Precio Unitario:</label>
                        <input type="number" step="0.01" class="form-control" name="precio_unitario" value="<?php echo $row['precio_unitario']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Fecha:</label>
                        <input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha']; ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Select a Provider:</label>
                        <select class="form-control" name="proveedor_id" required>
                            <?php
                            // Obtener la lista de proveedores disponibles
                            $sql_providers = "SELECT * FROM proveedores";
                            $result_providers = mysqli_query($conn, $sql_providers);
                            while ($row_provider = mysqli_fetch_assoc($result_providers)) {
                                $selected = ($row_provider['id'] == $row['proveedor_id']) ? 'selected' : '';
                                echo "<option value='" . $row_provider['id'] . "' $selected>" . $row_provider['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-info" name="submit">Update</button>
                    <a href="Verproductos.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
