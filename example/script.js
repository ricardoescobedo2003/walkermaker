function buscarUsuario() {
    // Obtener el nombre del formulario
    var nombre = document.getElementById("nombre").value;

    // Realizar una petición AJAX para buscar al usuario en la base de datos
    // (Debes implementar esto en tu entorno)
    // Mostrar los resultados en el div 'resultado'
    
    // Mostrar el formulario de pago después de la búsqueda
    document.getElementById("pagoForm").style.display = "block";
}

function registrarPago() {
    // Obtener los datos del formulario de pago
    var fecha = document.getElementById("fecha").value;
    var monto = document.getElementById("monto").value;
    var concepto = document.getElementById("concepto").value;

    // Realizar una petición AJAX para guardar los datos en la base de datos
    // (Debes implementar esto en tu entorno)

    // Limpiar el formulario después de registrar el pago
    document.getElementById("fecha").value = "";
    document.getElementById("monto").value = "";
    document.getElementById("concepto").value = "";

    // Puedes mostrar un mensaje de éxito o realizar otras acciones después de guardar el pago
}
