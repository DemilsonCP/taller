<?php
$nuevo = $_POST["nuevo"];
$antiguo = $_POST["antiguo"];
$Ndescripcion = $_POST["Ndescripcion"];
$Adescripcion = $_POST["Adescripcion"];
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

// Corregir la construcción de la consulta SQL
$update_query = "UPDATE `categoria` SET 
`NOMBRE` = '" . mysqli_real_escape_string($mysqli_link, $nuevo) . "',
`DESCRIPCION` = '" . mysqli_real_escape_string($mysqli_link, $Ndescripcion) . "' 

WHERE 
`NOMBRE` = '" . mysqli_real_escape_string($mysqli_link, $antiguo) . "'OR
`DESCRIPCION` = '" . mysqli_real_escape_string($mysqli_link, $Adescripcion) . "'";

// Ejecutar la consulta de actualización
if (mysqli_query($mysqli_link, $update_query)) {
    echo 'Se modificó correctamente.';
} else {
    echo 'Error al modificar: ' . mysqli_error($mysqli_link);
}

// Cerrar la conexión a la base de datos
mysqli_close($mysqli_link);
?>
