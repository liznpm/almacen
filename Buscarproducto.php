<?php
include "db_conn.php";
include 'nav.php';

// Inicializar la variable de búsqueda
$searchProduct = '';

if (isset($_POST['search'])) {
    // Obtener el término de búsqueda ingresado por el usuario
    $searchProduct = $_POST['search'];
    
    // Consulta SQL para buscar el producto en la base de datos
    $sql = "SELECT * FROM `productos` WHERE `product_name` LIKE '%$searchProduct%'";
    $result = mysqli_query($conn, $sql);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buscar productos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <div class="container mt-4">
        <h1 class="mb-4">Buscar productos</h1>
        <form method="post" class="form-inline mb-4">
            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Buscar producto">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php
        // Mostrar resultados de la búsqueda si existen
        if (isset($result) && mysqli_num_rows($result) > 0) {
            echo "<h3>Resultados de la búsqueda:</h3>";
            echo "<table class='table'>";
            echo "<thead><tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th></tr></thead>";
            echo "<tbody>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>$" . $row['price'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } elseif (isset($_POST['search'])) {
            echo "<p>No se encontraron resultados para '$searchProduct'.</p>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
