<?php
include "db_conn.php";
include 'nav.php';

// Verificar si la conexión a la base de datos se ha realizado correctamente
if (!$conn) {
    echo "Error: No se pudo conectar a la base de datos.";
} else {
    // Verificar si la tabla 'compras' existe en la base de datos
    $sql_check_table = "SHOW TABLES LIKE 'compras'";
    $result_check_table = mysqli_query($conn, $sql_check_table);

    if (mysqli_num_rows($result_check_table) > 0) {
        // La tabla 'compras' existe, obtener la lista de compras de la base de datos
        $sql = "SELECT c.id AS compra_id, c.fecha AS fecha_compra, p.nombre AS nombre_producto, p.proveedor AS proveedor_producto, c.cantidad AS cantidad_compra, c.precio_unitario AS precio_unitario_compra
                FROM compras c
                INNER JOIN productos p ON c.producto_id = p.id";
        $result = mysqli_query($conn, $sql);
    } else {
        // La tabla 'compras' no existe o no hay datos en ella
        $result = false;
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
            <h3>Compras</h3>
            <button class="btn btn-primary print-button" onclick="window.print()">Imprimir</button>
            <button class="btn btn-primary" onclick="window.location.href = 'Proveedores.php'">Registrar proveedor</button>
        </div>

        <div class="container">
            <?php
            // Mostrar la tabla sin importar si hay datos o no
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Proveedor</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result !== false && mysqli_num_rows($result) > 0) {
                        // Iterar sobre las compras y mostrarlas en la tabla
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['compra_id'] . "</td>";
                            echo "<td>" . $row['proveedor_producto'] . "</td>";
                            echo "<td>" . $row['nombre_producto'] . "</td>";
                            echo "<td>" . $row['cantidad_compra'] . "</td>";
                            echo "<td>$" . $row['precio_unitario_compra'] . "</td>";
                            echo "<td>" . $row['fecha_compra'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Mostrar una fila vacía en la tabla en caso de no haber datos
                        echo "<tr>";
                        echo "<td colspan='6'>No hay datos de compras disponibles.</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
