<?php
// Conéctate a la base de datos y realiza la inserción del pago
// Aquí debes usar las funciones de conexión y ejecución de consultas específicas para tu entorno

// Ejemplo de conexión usando MySQLi
$conexion = new mysqli("localhost", "dni", "MinuzaFea265/", "doblenet");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$fechaPago = $_POST['fechaPago'];
$monto = $_POST['monto'];

// Insertar el pago en la tabla "pagos"
$query = "INSERT INTO pagos (fecha_pago, monto) VALUES ('$fechaPago', $monto)";

if ($conexion->query($query) === TRUE) {
    echo "Pago registrado con éxito";
} else {
    echo "Error al registrar el pago: " . $conexion->error;
}

$conexion->close();
?>
