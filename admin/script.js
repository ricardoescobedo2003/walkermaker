function registrarPago() {
    // Obtener los datos del formulario de pago
    var nombre = document.getElementById("nombre").value;
    var fecha = document.getElementById("fecha").value;
    var monto = document.getElementById("monto").value;
    var concepto = document.getElementById("concepto").value;

    // Realizar una petición AJAX para guardar los datos en la base de datos
    // (Debes implementar esto en tu entorno)
    // Puedes usar la función fetch para enviar los datos al servidor PHP

    fetch('registrar_pago.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'nombre=' + encodeURIComponent(nombre) + '&fecha=' + encodeURIComponent(fecha) + '&monto=' + encodeURIComponent(monto) + '&concepto=' + encodeURIComponent(concepto),
    })
    .then(response => response.text())
    .then(data => {
        // Procesar la respuesta del servidor
        console.log(data);
        alert(data); // Puedes mostrar una alerta o manejar de otra manera 4915 6644 9302 0472
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
