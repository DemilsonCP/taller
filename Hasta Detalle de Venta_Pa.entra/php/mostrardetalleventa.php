<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
$select_query = "SELECT * FROM detalle_venta LIMIT 10";
$result = mysqli_query($mysqli_link, $select_query);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "Id: " . $row['ID'] . "<br/>";
    echo "Id venta: " . $row['IDvta'] . "<br/>";
    echo "Id Producto: " . $row['IDproducto'] . "<br/>";
    echo "Cantidad: " . $row['CANTIDAD'] . "<br/>";
    echo "<br/>";
}
// close the db connection
mysqli_close($mysqli_link);
