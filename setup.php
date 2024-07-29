<?php
$servername = "localhost";
$username = "root";
$password = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Script SQL
$sql = "
CREATE DATABASE IF NOT EXISTS AGENCIA;

USE AGENCIA;

CREATE TABLE IF NOT EXISTS VUELO (
    id_vuelo INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    origen VARCHAR(100) NOT NULL,
    destino VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    plazas_disponibles INT(11) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS HOTEL (
    id_hotel INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ubicacion VARCHAR(100) NOT NULL,
    habitaciones_disponibles INT(11) NOT NULL,
    tarifa_noche DECIMAL(10, 2) NOT NULL
);

CREATE TABLE IF NOT EXISTS RESERVA (
    id_reserva INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT(11) NOT NULL,
    fecha_reserva DATE NOT NULL,
    id_vuelo INT(11) UNSIGNED,
    id_hotel INT(11) UNSIGNED,
    FOREIGN KEY (id_vuelo) REFERENCES VUELO(id_vuelo),
    FOREIGN KEY (id_hotel) REFERENCES HOTEL(id_hotel)
);
";

if ($conn->multi_query($sql) === TRUE) {
    echo "Base de datos y tablas creadas exitosamente";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
