<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "doblenet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$fechaInstalacion = $_POST['fechaInstalacion'];
$equipos = $_POST['equipos'];
$mensualidad = $_POST['mensualidad'];

// Insertar datos en la tabla clientes
$sql = "INSERT INTO clientes (nombre, direccion, telefono, fechaInstalacion, equipos, mensualidad) VALUES ('$nombre', '$direccion', '$telefono', '$fechaInstalacion', '$equipos', '$mensualidad')";

if ($conn->query($sql) === TRUE) {
    echo "Cliente guardado correctamente";
} else {
    echo "Error al guardar el cliente: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
