<?php
include "db_conn.php";
include 'nav.php';


if (isset($_POST["submit"])) {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Consulta SQL para insertar los datos del proveedor en la tabla "proveedores"
    $sql = "INSERT INTO proveedores (nombre, direccion, telefono, email) VALUES ('$nombre', '$direccion', '$telefono', '$email')";
    if (mysqli_query($conn, $sql)) {
        // If the query is successful, redirect the user to another page or show a success message.
        // For example:
        // header("Location: success.php");
        // exit;
        echo "proveedor added successfully!";
    } else {
        // If there's an error in the query execution, you can handle it accordingly.
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro de Proveedores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Registro de Proveedores</h3>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Proveedor" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección del Proveedor" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono del Proveedor" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico del Proveedor" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info mr-2" name="submit">Guardar Proveedor</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-d46Eh6ko1RpfwZ2hce3RmzO2KZShFZmli1vVN1WdhXwp1m3lMTFxW1gW1P1JZcY2"
        crossorigin="anonymous"></script>

</body>

</html>
