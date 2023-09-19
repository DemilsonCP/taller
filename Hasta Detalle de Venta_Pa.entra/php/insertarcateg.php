<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno())
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
 }
  $nombre = $_POST["nombre"];
  $categoria = $_POST["descripcion"];
  // $web = $_POST["web"];
//   $clave = $_POST["cantidad"];
  // $direccion = $_POST["direccion"];


    $insert_query = "INSERT INTO `categoria`(`NOMBRE`,`DESCRIPCION`) 
    VALUES ('". mysqli_real_escape_string($mysqli_link, $nombre)."','".mysqli_real_escape_string($mysqli_link, $categoria)."')";
 
If (mysqli_query($mysqli_link, $insert_query)) {
    echo 'exitoso';
}

mysqli_close($mysqli_link);


?>


