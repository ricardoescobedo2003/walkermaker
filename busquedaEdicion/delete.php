<?php
$host = "localhost";
$usuario = "dni";
$contrasena = "MinuzaFea265/";
$base_datos = "doblenet";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST["id_cliente"];

    $sql = "DELETE FROM clientes WHERE id_cliente = $id_cliente";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }
}

$conn->close();
?>
