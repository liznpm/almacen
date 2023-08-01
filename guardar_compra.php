<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
    $producto_id = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $proveedor_id = $_POST['proveedor'];

    // Consulta SQL para insertar los datos de la compra en la tabla "compras" (suponiendo que tienes una tabla "compras")
    $sql = "INSERT INTO compras (producto_id, cantidad, proveedor_id) VALUES ($producto_id, $cantidad, $proveedor_id)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirigir a la página de éxito o mostrar un mensaje de éxito
        header("Location: compras.php?success=1");
        exit();
    } else {
        // Mostrar un mensaje de error o redirigir a la página de error
        header("Location: compras.php?error=1");
        exit();
    }
}
?>
