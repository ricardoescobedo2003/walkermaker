<?php
require('fpdf/fpdf.php');

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

// Verificar la ejecución exitosa de la consulta
if ($result !== false) {
    // Crear instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Agregar logotipo
    $logo = 'logo.png'; // Cambia esto al nombre de tu archivo de logotipo
    $pdf->Image($logo, 10, 10, 30);

    // Mover la posición vertical
    $pdf->Ln(40); // Ajusta este valor según sea necesario

    // Encabezados de la tabla
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'ID', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Fecha', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Monto', 1, 1, 'C'); // Cambiado a 1 para saltar de línea

    // Mostrar resultados en la tabla
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(40, 10, $row["id_pago"], 1, 0, 'C');
            $pdf->Cell(60, 10, $row["nombre"], 1, 0, 'C');
            $pdf->Cell(40, 10, $row["fecha"], 1, 0, 'C');
            $pdf->Cell(40, 10, $row["monto"], 1, 1, 'C');
        }
    } else {
        echo "No se encontraron resultados.";
    }

    // Agregar información adicional al final del documento
    $pdf->Ln(10); // Salto de línea
    $pdf->SetFont('Arial', 'I', 10); // Cambiado a cursiva
    $pdf->Cell(0, 10, 'Informacion de contacto:', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 10, 'Telefono: +123456789', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Correo electronico: ricardo.escobedo@doblenetsystem.com', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Compania: DoblenetSystem', 0, 1, 'L');
    $pdf->Cell(0, 10, 'Software by R-Escobedo', 0, 1, 'L');
    
    // Guardar el PDF como archivo
    $pdfFileName = 'comprobante.pdf';
    $pdf->Output($pdfFileName, 'F');
    
    // Mostrar enlace para descargar el PDF con estilos
    echo '<a href="' . $pdfFileName . '" download style="color: blue;">Descargar Comprobante</a>';

} else {
    echo "Error en la consulta SQL.";
}

// Cerrar la conexión a la base de datos
if ($conn) {
    $conn->close();
}
?>
