<?php
$nuevo = $_POST["nuevo"];
$antiguo = $_POST["antiguo"];
$Nfecha = $_POST["Nfecha"];
$Afecha = $_POST["Afecha"];
$Nfinal = $_POST["Nfinal"];
$Afinal = $_POST["Afinal"];
$Ndes = $_POST["Ndes"];
$Ades = $_POST["Ades"];
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

// Corregir la construcción de la consulta SQL
$update_query = "UPDATE `proveedor` SET 
 `NIT` = '" . mysqli_real_escape_string($mysqli_link, $nuevo) . "',
 `FECHA` = '" . mysqli_real_escape_string($mysqli_link, $Nfecha) ."',
 `MONTO_FINAL` = '" . mysqli_real_escape_string($mysqli_link, $Nfinal) . "',
 `DESCUENTO` = '" . mysqli_real_escape_string($mysqli_link, $Ndes) . "'

 WHERE 
 `NIT` = '" . mysqli_real_escape_string($mysqli_link, $antiguo) . "'OR
 `FECHA` = '" . mysqli_real_escape_string($mysqli_link, $Afecha) . "'OR
 `MONTO_FINAL` = '" . mysqli_real_escape_string($mysqli_link, $Afinal) . "'OR
 `DESCUENTO` = '" . mysqli_real_escape_string($mysqli_link, $Ades) . "'";

// Ejecutar la consulta de actualización
if (mysqli_query($mysqli_link, $update_query)) {
    echo 'Se modificó correctamente.';
} else {
    echo 'Error al modificar: ' . mysqli_error($mysqli_link);
}

// Cerrar la conexión a la base de datos
mysqli_close($mysqli_link);
?>
