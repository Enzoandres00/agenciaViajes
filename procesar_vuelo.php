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
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $plazas_disponibles = $_POST['plazas_disponibles'];
    $precio = $_POST['precio'];

    // Preparar la consulta SQL para insertar un nuevo vuelo
    $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio)
            VALUES ('$origen', '$destino', '$fecha', $plazas_disponibles, $precio)";

    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Vuelo agregado exitosamente";
    } else {
        echo "Error al agregar vuelo: " . $conn->error;
    }
} else {
    echo "Error: No se recibieron datos del formulario.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
