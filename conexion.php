


<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "dbimagenes";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>