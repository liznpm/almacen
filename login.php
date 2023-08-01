<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Conexión a la base de datos
    $conn = mysqli_connect("localhost", "usuario_db", "contraseña_db", "nombre_db");

    // Verificar conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta para verificar las credenciales del usuario
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($result) == 1) {
        // Usuario autenticado correctamente
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); // Redirigir al dashboard o página de inicio después del inicio de sesión
    } else {
        // Credenciales inválidas, mostrar mensaje de error o redirigir a la página de inicio de sesión nuevamente
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    // Cerrar la conexión
    mysqli_close($conn);
}
?>

