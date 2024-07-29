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

// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $habitaciones_disponibles = $_POST['habitaciones_disponibles'];
    $tarifa_noche = $_POST['tarifa_noche'];

    // Preparar la consulta SQL para insertar un nuevo hotel
    $sql = "INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche)
        VALUES ('$nombre', '$ubicacion', $habitaciones_disponibles, $tarifa_noche)";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
    	echo "Hotel agregado exitosamente";
    } else {
        echo "Error al agregar hotel: " . $conn->error;
    }
} else {
    echo "Error: No se recibieron datos del formulario.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>