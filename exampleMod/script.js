document.addEventListener("DOMContentLoaded", function() {
  cargarClientes();
});

function cargarClientes() {
  // Llamada AJAX para obtener datos de clientes desde PHP
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
          var clientes = JSON.parse(xhr.responseText);
          mostrarClientes(clientes);
      }
  };
  xhr.open("GET", "clientes.php", true);
  xhr.send();
}

function mostrarClientes(clientes) {
  var table = document.getElementById("clientesTable");
  table.innerHTML = "<tr><th>ID</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Fecha de Instalación</th><th>Equipos</th><th>Acciones</th></tr>";

  for (var i = 0; i < clientes.length; i++) {
      var row = table.insertRow(-1);
      var cellId = row.insertCell(0);
      var cellNombre = row.insertCell(1);
      var cellDireccion = row.insertCell(2);
      var cellTelefono = row.insertCell(3);
      var cellFechaInstalacion = row.insertCell(4);
      var cellEquipos = row.insertCell(5);
      var cellAcciones = row.insertCell(6);

      cellId.innerHTML = clientes[i].id_cliente;
      cellNombre.innerHTML = clientes[i].nombre;
      cellDireccion.innerHTML = clientes[i].direccion;
      cellTelefono.innerHTML = clientes[i].telefono;
      cellFechaInstalacion.innerHTML = clientes[i].fechaInstalacion;
      cellEquipos.innerHTML = clientes[i].equipos;

      var btnEliminar = document.createElement("button");
      btnEliminar.innerText = "Eliminar";
      btnEliminar.onclick = function() {
          eliminarCliente(clientes[i].id_cliente);
      };
      cellAcciones.appendChild(btnEliminar);

      var btnModificar = document.createElement("button");
      btnModificar.innerText = "Modificar";
      btnModificar.onclick = function() {
          modificarCliente(clientes[i].id_cliente);
      };
      cellAcciones.appendChild(btnModificar);
  }
}

function eliminarCliente(idCliente) {
  // Llamada AJAX para eliminar cliente en PHP
  // Actualizar la lista de clientes después de la eliminación
}

function modificarCliente(idCliente) {
  // Implementar la lógica para modificar un cliente (puedes usar un modal, por ejemplo)
}
