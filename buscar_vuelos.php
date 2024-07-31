<!DOCTYPE html>
<html>
<head>
    <title>Buscar Vuelo</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Buscar Vuelo</h2>

    <!-- Formulario para buscar vuelos -->
    <form action="buscar_vuelo.php" method="get">
        Origen: <input type="text" name="origen"><br>
        Destino: <input type="text" name="destino"><br>
        Fecha: <input type="date" name="fecha"><br>
        <input type="submit" value="Buscar">
    </form>

    <?php
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "AGENCIA";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Inicializar variables para los criterios de búsqueda
    $origen = isset($_GET['origen']) ? $_GET['origen'] : '';
    $destino = isset($_GET['destino']) ? $_GET['destino'] : '';
    $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';

    // Preparar la consulta SQL con los criterios de búsqueda
    $sql = "SELECT * FROM VUELO WHERE 1=1";
    
    if (!empty($origen)) {
        $sql .= " AND origen LIKE '%" . $conn->real_escape_string($origen) . "%'";
    }

    if (!empty($destino)) {
        $sql .= " AND destino LIKE '%" . $conn->real_escape_string($destino) . "%'";
    }

    if (!empty($fecha)) {
        $sql .= " AND fecha = '" . $conn->real_escape_string($fecha) . "'";
    }

    $result = $conn->query($sql);

    // Mostrar los resultados
    if ($result->num_rows > 0) {
        echo "<h3>Resultados de la Búsqueda</h3>";
        echo "<table>
                <tr>
                    <th>ID Vuelo</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Plazas Disponibles</th>
                    <th>Precio</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["id_vuelo"]) . "</td>
                    <td>" . htmlspecialchars($row["origen"]) . "</td>
                    <td>" . htmlspecialchars($row["destino"]) . "</td>
                    <td>" . htmlspecialchars($row["fecha"]) . "</td>
                    <td>" . htmlspecialchars($row["plazas_disponibles"]) . "</td>
                    <td>" . htmlspecialchars($row["precio"]) . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='error'>No se encontraron vuelos que coincidan con los criterios de búsqueda.</p>";
    }

    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
