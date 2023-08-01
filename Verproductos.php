<?php
include "db_conn.php";
include 'nav.php';

// Verificar si la conexión a la base de datos se ha realizado correctamente
if (!$conn) {
    echo "Error: No se pudo conectar a la base de datos.";
} else {
    // Verificar si la tabla 'productos' existe en la base de datos
    $sql_check_table = "SHOW TABLES LIKE 'productos'";
    $result_check_table = mysqli_query($conn, $sql_check_table);

    if (mysqli_num_rows($result_check_table) > 0) {
        // La tabla 'productos' existe, obtener la lista de productos de la base de datos
        $sql = "SELECT * FROM `productos`";
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful before fetching data
        if ($result !== false && mysqli_num_rows($result) > 0) {
            // Rest of the code to display the table goes here
        } else {
            echo "<p>No hay productos disponibles actualmente.</p>";
        }
    } else {
        // La tabla 'productos' no existe o no hay datos en la tabla
        echo "<p>No hay productos disponibles actualmente.</p>";
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
        <h3>Product List</h3>
    </div>

    <div class="container">
        <?php
        // Verificar si hay datos en la tabla
        if ($result !== false && mysqli_num_rows($result) > 0) {
        ?>
           <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Fecha</th>
            <th>Proveedor</th>
            <th>Actions</th> <!-- Nueva columna para los botones de acciones -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Iterar sobre los productos y mostrarlos en la tabla
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>$" . $row['price'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['cantidad_disponible'] . "</td>";
            echo "<td>$" . $row['precio_unitario'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            
            // Fetch the provider name from the proveedores table based on proveedor_id
            $proveedor_id = $row['proveedor_id'];
            $sql_provider = "SELECT nombre FROM proveedores WHERE id='$proveedor_id'";
            $result_provider = mysqli_query($conn, $sql_provider);

            if ($result_provider !== false && mysqli_num_rows($result_provider) > 0) {
                $row_provider = mysqli_fetch_assoc($result_provider);
                $proveedor_name = $row_provider['nombre'];
            } else {
                $proveedor_name = "Unknown Provider";
            }

            echo "<td>" . $proveedor_name . "</td>"; 

            // Agregar los botones de acciones (Editar y Eliminar)
            echo "<td>";
            echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'><i class='fas fa-edit'></i> Editar</a>";
            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Eliminar</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>
    </tbody>
</table>

        <?php
        } else {
            echo "<p>No hay productos disponibles actualmente.</p>";
        }
        ?>
    </div>
</div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-bz/bv7ZC8X2m1ff1TwLTM45H2F34s+OTh64OjyBnPT7AhMCMmgaNYwL/N9I0J0ewb4M7iVKLZ+AJQVW8YY8dQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>


