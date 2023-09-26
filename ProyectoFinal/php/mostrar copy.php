<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
$select_query = "SELECT * FROM producto LIMIT 10";
$result = mysqli_query($mysqli_link, $select_query);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
    
    // Iterar a través de los resultados y mostrarlos en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
$conn->close();


while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
    echo "Nombre:" . $row['NOMBRE'] . "<br/>";
    echo "Precio:" . $row['PRECIO'] . "<br/>";
    echo "Stock:" . $row['STOCK'] . "<br/>";
    echo "Id_Categotia:" . $row['IDCATEGORIA'] . "<br/>";
    echo "<br/>";
}
// close the db connection
mysqli_close($mysqli_link);
