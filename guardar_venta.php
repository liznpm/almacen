<?php
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el formulario
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $status = "En Proceso"; // Estado inicial de la venta (puedes cambiarlo según tus necesidades)

    // Insertar la venta en la tabla de ventas
    $sql = "INSERT INTO ventas (product_id, product_name, price, status) VALUES ('$product_id', '$product_name', '$price', '$status')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // La venta se ha guardado correctamente, redirigir a una página de éxito o mostrar un mensaje
        header("Location: venta_exitosa.php");
        exit();
    } else {
        // Hubo un error al guardar la venta, redirigir a una página de error o mostrar un mensaje
        header("Location: error_venta.php");
        exit();
    }
}
?>
