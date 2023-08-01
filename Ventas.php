<?php
include "db_conn.php";
include 'nav.php';

// Verificar si la conexión a la base de datos se ha realizado correctamente
if (!$conn) {
    echo "Error: No se pudo conectar a la base de datos.";
} else {
    // Verificar si la tabla 'ventas' existe en la base de datos
    $sql_check_table = "SHOW TABLES LIKE 'ventas'";
    $result_check_table = mysqli_query($conn, $sql_check_table);

    if (mysqli_num_rows($result_check_table) > 0) {
        // La tabla 'ventas' existe, obtener la lista de ventas de la base de datos
        $sql = "SELECT * FROM `ventas`";
        $result = mysqli_query($conn, $sql);
    } else {
        // La tabla 'ventas' no existe o no hay datos en ella
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
            <h3>Ventas</h3>
            <button class="btn btn-primary" onclick="window.print()">Imprimir</button>
            <button class="btn btn-primary" onclick="window.location.href = 'Vender.php'">Vender</button>
        </div>

        <div class="container">
            <?php
            // Mostrar la tabla sin importar si hay datos o no
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result !== false && mysqli_num_rows($result) > 0) {
                        // Iterar sobre las ventas y mostrarlas en la tabla
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['cantidad_disponible'] . "</td>";
                            echo "<td>$" . $row['precio_unitario'] . "</td>";
                            echo "<td>" . $row['fecha'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Mostrar una fila vacía en la tabla en caso de no haber datos
                        echo "<tr>";
                        echo "<td colspan='6'>No sales data available.</td>";
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

    <button class="btn btn-primary print-button" onclick="window.print()">Imprimir</button>

</body>

</html>
