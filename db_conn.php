<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// crear conexiom
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Comprobar conexion
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
