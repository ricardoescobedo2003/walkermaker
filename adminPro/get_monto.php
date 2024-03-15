<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$dbname = "doblenet";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener el ID del cliente desde la solicitud AJAX
$clienteId = $_GET['id'];

// Consulta para obtener el monto del cliente
$sql = "SELECT monto FROM clientes WHERE id = $clienteId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar el monto
    while($row = $result->fetch_assoc()) {
        echo "Monto: " . $row["monto"];
    }
} else {
    echo "Cliente no encontrado";
}
$conn->close();
?>
