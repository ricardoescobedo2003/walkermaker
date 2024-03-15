<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Seleccionar cliente</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Seleccionar cliente</h1>
    <label for="cliente">Seleccionar Cliente:</label>
    <select id="cliente" onchange="mostrarMonto()">
        <option value="">Selecciona un cliente</option>
        <?php
    $servername = "localhost";
    $username = "dni";
    $password = "MinuzaFea265/";
    $dbname = "doblenet";

    $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Consulta para obtener los clientes
        $sql = "SELECT id, nombre FROM clientes";
        $result = $conn->query($sql);

        // Mostrar clientes en la lista desplegable
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["id"]."'>".$row["nombre"]."</option>";
            }
        }
        $conn->close();
        ?>
    </select>
    <br><br>
    <div id="monto"></div>
    <br><br>
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha">
</div>

<script src="script.js"></script>
</body>
</html>
