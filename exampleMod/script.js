function buscarCliente() {
  var nombreCliente = document.getElementById('clienteNombre').value;

  // Realiza una petición AJAX para buscar el cliente en la base de datos
  // y mostrar los resultados en el div con id "resultados"

  // En este ejemplo, se asume que la respuesta es un JSON con la información del cliente
  var clienteInfo = {
      nombre: "Cliente Ejemplo",
      fechasPago: ["2024-03-10", "2024-04-10"],
      saldoPendiente: 150.00
  };

  var resultadosDiv = document.getElementById('resultados');
  resultadosDiv.innerHTML = `<h2>Información del Cliente</h2>`;
  resultadosDiv.innerHTML += `<p><strong>Nombre:</strong> ${clienteInfo.nombre}</p>`;
  
  if (clienteInfo.fechasPago.length > 0) {
      resultadosDiv.innerHTML += `<h3>Fechas de Pago Pendientes</h3>`;
      clienteInfo.fechasPago.forEach(fecha => {
          resultadosDiv.innerHTML += `<p>${fecha}</p>`;
      });
  } else {
      resultadosDiv.innerHTML += `<p>No hay fechas de pago pendientes.</p>`;
  }

  resultadosDiv.innerHTML += `<h3>Saldo Pendiente</h3>`;
  resultadosDiv.innerHTML += `<p>${clienteInfo.saldoPendiente} USD</p>`;

  // Mostrar el formulario de pago
  document.getElementById('formPago').style.display = 'block';
}

function registrarPago() {
  var fechaPago = document.getElementById('fechaPago').value;
  var monto = document.getElementById('monto').value;

  // Realiza una petición AJAX para registrar el pago en la base de datos

  // En este ejemplo, se asume que la respuesta es un mensaje de éxito
  var mensajeExito = "¡Pago registrado con éxito!";
  alert(mensajeExito);
}
