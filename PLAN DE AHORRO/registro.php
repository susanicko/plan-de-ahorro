<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['Usuario'];
    $email = $_POST['Email'];
    $contraseña = password_hash($_POST['Contraseña'], PASSWORD_DEFAULT); // Encriptar contraseña

    // Preparar y bindear
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, email, contraseña) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $usuario, $email, $contraseña);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a index.html en caso de éxito
        header("Location: index.html");
        exit(); // Asegúrate de salir después de redirigir
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración y conexión
    $stmt->close();
    $conn->close();
}
?>
