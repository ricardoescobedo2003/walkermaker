<?php
$conexion = new mysqli("localhost", "dni", "MinuzaFea265/", "doblenet");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$consulta = $conexion->query("SELECT id_cliente, nombre FROM clientes");

while ($fila = $consulta->fetch_assoc()) {
    echo "<option value='" . $fila['id_cliente'] . "'>" . $fila['nombre'] . "</option>";
}

$conexion->close();
?>
