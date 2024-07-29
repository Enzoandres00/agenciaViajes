<!DOCTYPE html>
<html>
<head>
    <title>Consulta</title>
</head>
<body>
    <h2>Reservas por hotel</h2>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "AGENCIA";

    // Se crea la conexión con la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Se verifica que la conexión se haya realizado correctamente
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Realizamos la consulta avanzada 
    $sql = "
        SELECT h.nombre AS nombre_hotel, COUNT(r.id_reserva) AS num_reservas
        FROM RESERVA r
        JOIN HOTEL h ON r.id_hotel = h.id_hotel
        GROUP BY h.nombre
        HAVING num_reservas > 2;
    ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Hotel</th>
                    <th>Número de Reservas</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["nombre_hotel"] . "</td>
                    <td>" . $row["num_reservas"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay hoteles con más de dos reservas.";
    }

    $conn->close();
    ?>
</body>
</html>

