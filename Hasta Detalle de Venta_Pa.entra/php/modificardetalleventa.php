<?php
$NIDventa = $_POST["NIDventa"];
$AIDventa = $_POST["AIDventa"];
$NIDproducto = $_POST["NIDproducto"];
$AIDproducto = $_POST["AIDproducto"];
$Ncantidad = $_POST["Ncantidad"];
$Acantidad = $_POST["Acantidad"];
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

// Corregir la construcción de la consulta SQL
$update_query = "UPDATE `detalle_venta` SET 
 `IDvta` = '" . mysqli_real_escape_string($mysqli_link, $NIDventa) . "',
 `IDproducto` = '" . mysqli_real_escape_string($mysqli_link, $NIDproducto) ."',
 `CANTIDAD` = '" . mysqli_real_escape_string($mysqli_link, $Ncantidad) . "'

 WHERE 
 `IDvta` = '" . mysqli_real_escape_string($mysqli_link, $AIDventa) . "'OR
 `IDproducto` = '" . mysqli_real_escape_string($mysqli_link, $AIDproducto) . "'OR
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
