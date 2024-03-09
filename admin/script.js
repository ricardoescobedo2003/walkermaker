function buscarCliente() {
    var nombre = document.getElementById("nombre").value;

    // Realiza una petición AJAX para buscar el cliente en la base de datos
    fetch('buscar_cliente.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'nombre=' + encodeURIComponent(nombre),
    })
    .then(response => response.json())
    .then(data => {
        // Procesar la respuesta del servidor
        if (data.success) {
            // Mostrar la información del cliente encontrado
            alert("Cliente encontrado:\n" + data.clienteInfo);
            // Continuar con el registro de pago
            registrarPago();
        } else {
            alert("Cliente no encontrado");
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function registrarPago() {
    // Obtener los datos del formulario de pago
    var nombre = document.getElementById("nombre").value;
    var fecha = document.getElementById("fecha").value;
    var monto = document.getElementById("monto").value;

    // Realizar una petición AJAX para guardar los datos en la base de datos
    fetch('registrar_pago.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'nombre=' + encodeURIComponent(nombre) + '&fecha=' + encodeURIComponent(fecha) + '&monto=' + encodeURIComponent(monto),
    })
    .then(response => response.text())
    .then(data => {
        // Procesar la respuesta del servidor
        console.log(data);
        alert(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
