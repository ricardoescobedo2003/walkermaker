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

// Dividir el nombre en partes
$nombre_parts = explode(" ", $nombre);

// Crear una cadena de búsqueda para cada parte del nombre
$search_conditions = [];
foreach ($nombre_parts as $part) {
    $search_conditions[] = "nombre LIKE '%$part%'";
}
$search_conditions_str = implode(" AND ", $search_conditions);

$sql = "SELECT * FROM pagos WHERE $search_conditions_str ORDER BY fecha DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cliente_nombre = $row['nombre'];
    $fecha_pago = $row['fecha'];
    $monto_pago = $row['monto'];
} else {
    $cliente_nombre = "No encontrado";
    $fecha_pago = "No encontrado";
    $monto_pago = "No encontrado";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisp Manager Web</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">
        </div>

    </header>
    <div class="container">
        <h2>Wisp Manager Web</h2>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Información del Pago</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nombre del Cliente:</td>
                    <td><?php echo $cliente_nombre; ?></td>
                </tr>
                <tr>
                    <td>Fecha del Último Pago:</td>
                    <td><?php echo $fecha_pago; ?></td>
                </tr>
                <tr>
                    <td>Monto del Último Pago:</td>
                    <td><?php echo $monto_pago; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="info">
            <p><strong>Información adicional:</strong></p>
            <hr>
                <p><strong>Fecha de Emisión:</strong> <?php echo date("d/m/Y"); ?></p>
                <p><strong>Fecha de Vencimiento: 25 dias despues de emision</strong></p>
                <hr>

                <hr>
                <h4>Método de Pago:</h4>
                <p>Por favor, realiza el pago utilizando uno de los siguientes métodos:</p>
                <ul>
                    <li>Transferencia bancaria a la cuenta XXXX-XXXX-XXXX</li>
                    <li>Pago en efectivo con algun administrador</li>
                    <!-- Agrega más métodos de pago según sea necesario -->
                </ul>
                <hr>
                <h4>Información de Contacto:</h4>
                <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en contactarnos:</p>
                <ul>
                    <li>Teléfono: 498-144-22-66</li>
                    <li>Email: ricardoescobedo@ricardosync.tech</li>
                    <!-- Agrega más detalles de contacto según sea necesario -->
                </ul>
            <hr>
            <p><strong>Términos y Condiciones:</strong>
            Este documento sirve únicamente como comprobante de pago y no constituye una factura oficial.
            El pago registrado en este comprobante se refiere a los servicios/productos previamente acordados entre el cliente y Doblenet.
            .</p>
        </div>
    </div>
</body>
</html>
