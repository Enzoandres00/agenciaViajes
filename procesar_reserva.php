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

$id_cliente = $_POST['id_cliente'];
$fecha_reserva = $_POST['fecha_reserva'];
$id_vuelo = $_POST['id_vuelo'];
$id_hotel = $_POST['id_hotel'];

// SQL para insertar la reserva en la tabla RESERVA
$sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel)
        VALUES ($id_cliente, '$fecha_reserva', $id_vuelo, $id_hotel)";

if ($conn->query($sql) === TRUE) {
    echo "Reserva registrada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
