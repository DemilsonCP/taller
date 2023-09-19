<?php
$mysqli_link = mysqli_connect("localhost", "root","" , "sistema_venta");
if (mysqli_connect_errno())
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
 }
  $Oproducto = $_POST["opcionesProduct"];
  $Ocliente = $_POST["opcionesCli"];
  $cantidad = $_POST["cantidadt"];

    $insert_query = "INSERT INTO `detalle_venta`(`IDvta`,`IDproducto`, `CANTIDAD`) 
    VALUES ('".mysqli_real_escape_string($mysqli_link, $Ocliente)."','".mysqli_real_escape_string($mysqli_link, $Oproducto)."', '".mysqli_real_escape_string($mysqli_link, $cantidad)."')";
 
 If (mysqli_query($mysqli_link, $insert_query)) {

     echo 'Se envio correctamente';
}

mysqli_close($mysqli_link);

?>







