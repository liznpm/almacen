<?php
include "db_conn.php";

// Verificar si se recibió un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET["id"];

    // Consulta preparada para eliminar el registro
    $sql = "DELETE FROM `productos` WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Ejecutar la consulta preparada
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("Location: Verproductos.php?msg=Data deleted successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid ID.";
}
?>
