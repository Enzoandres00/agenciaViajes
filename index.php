<!DOCTYPE html>
<html>
<head>
    <title>Contenido de la Base de Datos</title>
</head>
<body>
    <h2>Contenido de la Base de Datos</h2>

    <?php
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

    // Mostrar contenido de la tabla VUELO
    echo "<h3>Tabla VUELO</h3>";
    $sql = "SELECT * FROM VUELO";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
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
                    <td>" . $row["id_vuelo"] . "</td>
                    <td>" . $row["origen"] . "</td>
                    <td>" . $row["destino"] . "</td>
                    <td>" . $row["fecha"] . "</td>
                    <td>" . $row["plazas_disponibles"] . "</td>
                    <td>" . $row["precio"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay datos en la tabla VUELO.";
    }

    // Mostrar contenido de la tabla HOTEL
    echo "<h3>Tabla HOTEL</h3>";
    $sql = "SELECT * FROM HOTEL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID Hotel</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Habitaciones Disponibles</th>
                    <th>Tarifa por Noche</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_hotel"] . "</td>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["ubicacion"] . "</td>
                    <td>" . $row["habitaciones_disponibles"] . "</td>
                    <td>" . $row["tarifa_noche"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay datos en la tabla HOTEL.";
    }

    // Mostrar contenido de la tabla RESERVA
    echo "<h3>Tabla RESERVA</h3>";
    $sql = "SELECT * FROM RESERVA";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID Reserva</th>
                    <th>ID Cliente</th>
                    <th>Fecha Reserva</th>
                    <th>ID Vuelo</th>
                    <th>ID Hotel</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_reserva"] . "</td>
                    <td>" . $row["id_cliente"] . "</td>
                    <td>" . $row["fecha_reserva"] . "</td>
                    <td>" . $row["id_vuelo"] . "</td>
                    <td>" . $row["id_hotel"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay datos en la tabla RESERVA.";
    }

    $conn->close();
    ?>
</body>
</html>
