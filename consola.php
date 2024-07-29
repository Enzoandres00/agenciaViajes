<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

$id_cliente = 1;
$fecha_reserva = '2024-07-20';
$id_vuelo = 2;
$id_hotel = 3;

// Consulta SQL para insertar datos en la tabla RESERVA
$sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel)
        VALUES ($id_cliente, '$fecha_reserva', $id_vuelo, $id_hotel)";

// Ejecutar la consulta y verificar si fue exitosa
if ($conn->query($sql) === TRUE) {
    echo "Reserva registrada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>