<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $monto = isset($_POST['monto']) ? floatval($_POST['monto']) : 0;
    $interes = isset($_POST['interes']) ? floatval($_POST['interes']) / 100 : 0;
    $anios = isset($_POST['anios']) ? intval($_POST['anios']) : 0;

    // Validar datos
    if ($monto <= 0 || $interes < 0 || $anios <= 0) {
        echo 'Por favor, ingrese valores válidos.';
        exit;
    }

    // Calcular el total acumulado usando interés compuesto
    $total = $monto * pow(1 + $interes, $anios);
    
    // Devolver el resultado
    echo "Total acumulado después de $anios años: $" . number_format($total, 2);
} else {
    echo 'Método de solicitud no válido.';
}
?>
