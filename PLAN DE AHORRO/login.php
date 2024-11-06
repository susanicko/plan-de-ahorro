<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['password'];

    // Preparar y ejecutar la consulta
    $sql = "SELECT contraseña FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si el usuario existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($contraseña_hashed);
        $stmt->fetch();

        // Verificar la contraseña
        if (password_verify($contraseña, $contraseña_hashed)) {
            // Iniciar sesión y redirigir a una página de éxito
            session_start();
            $_SESSION['email'] = $email; // Puedes almacenar más información si lo deseas
            header("Location: index.html"); // Cambia esto a la página que desees
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El correo electrónico no está registrado.";
    }

    $stmt->close();
}

$conn->close();
?>
