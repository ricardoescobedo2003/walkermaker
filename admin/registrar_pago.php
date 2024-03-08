<?php
// Conectar a la base de datos (reemplaza los valores con los de tu entorno)
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "doblenet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos del formulario de pago
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$monto = $_POST['monto'];
$concepto = $_POST['concepto']; // Este campo está en el formulario, pero no se está utilizando en la inserción

// Realizar la inserción en la tabla pagos
$query = "INSERT INTO pagos (nombre, fecha, monto, concepto) VALUES ('$nombre', '$fecha', '$monto', '$concepto')";

if ($conn->query($query) === TRUE) {
    echo "Pago registrado con éxito";
} else {
    echo "Error al registrar el pago: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
