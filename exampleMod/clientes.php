<?php
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "doblenet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_cliente, nombre, direccion, telefono, fechaInstalacion, equipos FROM clientes";
$result = $conn->query($sql);

$clientes = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($clientes);
?>
