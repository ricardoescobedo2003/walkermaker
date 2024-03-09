<?php
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "doblenet";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];

// Consultar la base de datos para encontrar al cliente
$query = "SELECT * FROM clientes WHERE nombre = '$nombre'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Cliente encontrado, devolver información
    $clienteInfo = $result->fetch_assoc();
    echo json_encode(array('success' => true, 'clienteInfo' => $clienteInfo));
} else {
    // Cliente no encontrado
    echo json_encode(array('success' => false));
}

$conn->close();
?>
