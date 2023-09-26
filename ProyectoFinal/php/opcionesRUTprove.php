<?php
// Función para obtener las opciones desde la base de datos
function obtenerOpciones() {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistema_venta";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consultar la base de datos para obtener las opciones
    $query = "SELECT  RUT FROM proveedor";
    $result = $conn->query($query);

    // Crear un array para almacenar las opciones
    $opciones = array();

    while ($row = $result->fetch_assoc()) {
        $opciones[] = [$row['RUT']];
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

    return $opciones;
}

// Llamar a la función y devolver las opciones como JSON
$options = obtenerOpciones();
header('Content-Type: application/json');
echo json_encode($options);
?>