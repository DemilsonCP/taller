<?php
$mysqli_link = mysqli_connect("localhost", "root","" , "sistema_venta");
if (mysqli_connect_errno())
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
 }
  $Nombre = $_POST["Nombre"];
  $Contraseña = $_POST["Contraseña"];

    $insert_query = "INSERT INTO `regsitro`(`NOMBRE`,`CONTRA`) 
    VALUES ('".mysqli_real_escape_string($mysqli_link, $Nombre)."','".(md5(mysqli_real_escape_string($mysqli_link, $Contraseña)))."')";
 
 If (mysqli_query($mysqli_link, $insert_query)) {

    header("Location:../html/index.html");
    exit;
}
mysqli_close($mysqli_link);

?>
