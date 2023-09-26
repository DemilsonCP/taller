<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno())
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
 }
  $nit = $_POST["opcionesCli"];
  $fecha = $_POST["fecha"];
  $descuento = $_POST["descuento"];


    $insert_query = "INSERT INTO `venta`(`NIT`,`FECHA`,`DESCUENTO`) 
    VALUES ('".mysqli_real_escape_string($mysqli_link, $nit)."','".mysqli_real_escape_string($mysqli_link, $fecha)."','".mysqli_real_escape_string($mysqli_link, $descuento)."')";
 
If (mysqli_query($mysqli_link, $insert_query)) {
    // echo "exitoso";
     header("Location:../html/insertarventa.html");
exit;
}

mysqli_close($mysqli_link);

?>
