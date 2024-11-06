<?php
$servername = "localhost";
$username = "root"; // o el nombre de usuario que estés utilizando
$password = ""; // sin contraseña
$dbname = "plan_de_ahorro"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}
?>
