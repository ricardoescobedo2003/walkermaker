<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "dni";
$password = "MinuzaFea265/";
$database = "doblenet";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener las credenciales del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
$result = $conn->query($sql);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($result->num_rows > 0) {
    echo "¡Inicio de sesión exitoso!";
} else {
    echo "Credenciales incorrectas. Inténtalo de nuevo.";
}

$conn->close();
?>
