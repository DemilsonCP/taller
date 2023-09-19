<?php
$Ncantidad = $_POST["Ncantidad"];
$Acantidad = $_POST["Acantidad"];
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

// Corregir la construcción de la consulta SQL
$update_query = "UPDATE `detalle_venta` SET 

 `CANTIDAD` = '" . mysqli_real_escape_string($mysqli_link, $Ncantidad) . "'
 WHERE 
 `CANTIDAD` = '" . mysqli_real_escape_string($mysqli_link, $Acantidad) . "'";

// Ejecutar la consulta de actualización
if (mysqli_query($mysqli_link, $update_query)) {
    echo 'Se modificó correctamente.';
} else {
    echo 'Error al modificar: ' . mysqli_error($mysqli_link);
}

// Cerrar la conexión a la base de datos
mysqli_close($mysqli_link);
?>
