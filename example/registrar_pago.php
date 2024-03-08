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

// Obtener los datos del formulario de pago desde la solicitud AJAX
$fecha = $_GET['fecha'];
$monto = $_GET['monto'];
$concepto = $_GET['concepto'];

// Realizar la inserción en la tabla pagos
$query = "INSERT INTO pagos (fecha, monto, concepto) VALUES ('$fecha', '$monto', '$concepto')";
$result = $conn->query($query);

// Procesar el resultado y devolverlo como respuesta AJAX (puedes personalizar esto)
if ($result) {
    echo "Pago registrado con éxito";
} else {
    echo "Error al registrar el pago: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
