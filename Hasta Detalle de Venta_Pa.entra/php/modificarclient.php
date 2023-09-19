<?php
$nuevo = $_POST["nuevo"];
$antiguo = $_POST["antiguo"];
$Ntelefono = $_POST["Ntelefono"];
$Atelefono = $_POST["Atelefono"];
$Ndireccion = $_POST["Ndireccion"];
$Adireccion = $_POST["Adireccion"];
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

// Corregir la construcción de la consulta SQL
$update_query = "UPDATE `cliente` SET 
 `NOMBRE` = '" . mysqli_real_escape_string($mysqli_link, $nuevo) . "',
 `TELEFONO` = '" . mysqli_real_escape_string($mysqli_link, $Ntelefono) ."',
 `DIRECCION` = '" . mysqli_real_escape_string($mysqli_link, $Ndireccion) . "'

 WHERE 
 `NOMBRE` = '" . mysqli_real_escape_string($mysqli_link, $antiguo) . "'OR
 `TELEFONO` = '" . mysqli_real_escape_string($mysqli_link, $Atelefono) . "'OR
 `DIRECCION` = '" . mysqli_real_escape_string($mysqli_link, $Adireccion) . "'";

// Ejecutar la consulta de actualización
if (mysqli_query($mysqli_link, $update_query)) {
    echo 'Se modificó correctamente.';
} else {
    echo 'Error al modificar: ' . mysqli_error($mysqli_link);
}

// Cerrar la conexión a la base de datos
mysqli_close($mysqli_link);
?>
