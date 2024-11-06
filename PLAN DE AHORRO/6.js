function calcularAhorro() {
    const monto = parseFloat(document.getElementById('monto').value);
    const interes = parseFloat(document.getElementById('interes').value);
    const anios = parseFloat(document.getElementById('anios').value);

    if (isNaN(monto) || isNaN(interes) || isNaN(anios) || monto <= 0 || interes < 0 || anios <= 0) {
        document.getElementById('resultado').innerText = 'Por favor, ingresa valores válidos en todos los campos.';
        return;
    }

    // Calculo del monto total al final del período (con interés compuesto anual)
    const montoFinal = monto * Math.pow((1 + interes / 100), anios);

    // Calculo de ahorro diario
    const ahorroDiario = montoFinal / (anios * 365);

    // Muestra el resultado en la página
    document.getElementById('resultado').innerText = 
        `Para alcanzar el monto final de ${montoFinal.toFixed(2)}, necesitas ahorrar aproximadamente ${ahorroDiario.toFixed(2)} por día.`;
}
