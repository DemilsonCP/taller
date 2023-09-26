<?php
$nuevo = $_POST["nuevo"];
$antiguo = $_POST["antiguo"];
$Nprecio = $_POST["Nprecio"];
$Aprecio = $_POST["Aprecio"];
$Nstock = $_POST["Nstock"];
$Astock = $_POST["Astock"];
$Nidcategoria = $_POST["Nidcategoria"];
$Aidcategoria = $_POST["Aidcategoria"];

$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

// Corregir la construcción de la consulta SQL
 $update_query = "UPDATE `producto` SET 
 `NOMBRE` = '" . mysqli_real_escape_string($mysqli_link, $nuevo) . "',
 `PRECIO` = '" . mysqli_real_escape_string($mysqli_link, $Nprecio) ."',
 `STOCK` = '" . mysqli_real_escape_string($mysqli_link, $Nstock) . "',
 `IDCATEGORIA` = '" . mysqli_real_escape_string($mysqli_link, $Nidcategoria) . "'

 WHERE 
 `NOMBRE` = '" . mysqli_real_escape_string($mysqli_link, $antiguo) . "'OR
 `PRECIO` = '" . mysqli_real_escape_string($mysqli_link, $Aprecio) . "'OR
 `STOCK` = '" . mysqli_real_escape_string($mysqli_link, $Astock) . "'OR
 `IDCATEGORIA` = '" . mysqli_real_escape_string($mysqli_link, $Aidcategoria) . "'";


// Ejecutar la consulta de actualización
if (mysqli_query($mysqli_link, $update_query)) {
    echo 'Se modificó correctamente.';
} else {
    echo 'Error al modificar: ' . mysqli_error($mysqli_link);
}

// Cerrar la conexión a la base de datos
mysqli_close($mysqli_link);
?>


