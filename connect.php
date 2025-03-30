<?php
// Detalles de conexión
$servername = "localhost";
$username = "root";  // Cambia según tu configuración
$password = 'Pa$$w0rd';  // Contraseña de tu base de datos
$dbname = "CafeteriaDB";  // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>


