<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
$select_query = "SELECT * FROM cliente LIMIT 10";
$result = mysqli_query($mysqli_link, $select_query);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "Nombre:" . $row['NOMBRE'] . "<br/>";
    echo "Tefefono:" . $row['TELEFONO'] . "<br/>";
    echo "Direccion:" . $row['DIRECCION'] . "<br/>";
    echo "<br/>";
}
// close the db connection
mysqli_close($mysqli_link);
