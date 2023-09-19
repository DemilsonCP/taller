<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno())
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
 }
  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];
  $stock = $_POST["stock"];
  $categoria = $_POST["categoria"];


    $insert_query = "INSERT INTO `producto`(`NOMBRE`,`PRECIO`,`STOCK`, `IDCATEGORIA`) 
    VALUES ('". mysqli_real_escape_string($mysqli_link, $nombre)."','".mysqli_real_escape_string($mysqli_link, $precio)."','".mysqli_real_escape_string($mysqli_link, $stock) ."', '". mysqli_real_escape_string($mysqli_link, $categoria)."')";
 
If (mysqli_query($mysqli_link, $insert_query)) {
    echo 'exitoso';
}

mysqli_close($mysqli_link);


?>


