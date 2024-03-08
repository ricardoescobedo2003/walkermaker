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

// Obtener los parámetros de búsqueda desde la solicitud AJAX
$nombre = $_GET['nombre'];
$fecha = $_GET['fecha'];

// Construir la consulta basada en los parámetros recibidos
$query = "SELECT * FROM pagos WHERE 1=1";

if (!empty($nombre)) {
    $query .= " AND nombre LIKE '%$nombre%'";
}

if (!empty($fecha)) {
    $query .= " AND fecha = '$fecha'";
}

// Ejecutar la consulta
$result = $conn->query($query);

// Mostrar los resultados (puedes personalizar esto)
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_pago"] . "<br>Nombre: " . $row["nombre"] . "<br>Fecha: " . $row["fecha"] . "<br>Monto: " . $row["monto"] . "<br><hr>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
