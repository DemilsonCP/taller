<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno())
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
 }
  $nombre = $_POST["nombre"];
  $telefono = $_POST["telefono"];
  $web = $_POST["web"];
//   $clave = $_POST["cantidad"];
  $direccion = $_POST["direccion"];


    $insert_query = "INSERT INTO `proveedor`(`NOMBRE`,`TELEFONO`,`WEB`, `DIRECCION`) 
    VALUES ('". mysqli_real_escape_string($mysqli_link, $nombre)."','".mysqli_real_escape_string($mysqli_link, $telefono)."','".mysqli_real_escape_string($mysqli_link, $web) ."', '". mysqli_real_escape_string($mysqli_link, $direccion)."')";
 
If (mysqli_query($mysqli_link, $insert_query)) {
    echo 'exitoso';
}

mysqli_close($mysqli_link);


?>


