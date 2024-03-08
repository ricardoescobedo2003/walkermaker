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

// Obtener el nombre del usuario desde la solicitud AJAX
$nombre = $_GET['nombre'];

// Realizar la consulta para buscar al usuario en la tabla clientes
$query = "SELECT * FROM clientes WHERE nombre = '$nombre'";
$result = $conn->query($query);

// Procesar los resultados y devolverlos como respuesta AJAX (puedes personalizar esto)
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "ID: " . $row["id"] . "<br>Nombre: " . $row["nombre"] . "<br>Email: " . $row["email"];
} else {
    echo "Usuario no encontrado";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
