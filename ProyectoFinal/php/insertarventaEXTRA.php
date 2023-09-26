<?php
// Recibir los datos enviados desde JavaScript
$idVenta = $_POST['idVenta'];
$total = $_POST['total'];

// Hacer la conexión a la base de datos (configura según tus credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_venta";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para verificar si el idVenta ya existe en la base de datos
$sql = "SELECT ID FROM venta WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idVenta);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si existe un registro con el mismo idVenta
if ($result->num_rows > 0) {
    // Ya existe un registro con el mismo idVenta en la base de datos, puedes realizar la actualización del total
    $updateSql = "UPDATE venta SET MONTO_FINAL = ? WHERE ID = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("di", $total, $idVenta);
    
    if ($updateStmt->execute()) {
        echo "Total actualizado correctamente en la base de datos";
    } else {
        echo "Error al actualizar el total en la base de datos: " . $conn->error;
    }
} else {
    // No existe un registro con el mismo idVenta en la base de datos, puedes insertar uno nuevo
    $insertSql = "INSERT INTO venta (ID, MONTO_FINAL) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("di", $idVenta, $total);

    if ($insertStmt->execute()) {
        echo "Nuevo registro insertado correctamente en la base de datos";
    } else {
        echo "Error al insertar nuevo registro en la base de datos: " . $conn->error;
    }
}

// Consulta SQL para obtener el valor de "precio_producto" basado en "idVenta"
$getPrecioSql = "SELECT DESCUENTO FROM venta WHERE ID = ?";
$getPrecioStmt = $conn->prepare($getPrecioSql);
$getPrecioStmt->bind_param("i", $idVenta);
$getPrecioStmt->execute();
$precioResult = $getPrecioStmt->get_result();

if ($precioResult->num_rows > 0) {
    $row = $precioResult->fetch_assoc();
    $precioProducto = $row['DESCUENTO'];
} else {
    // Manejo de error si no se encuentra el registro
    echo "Error: No se encontró el registro con ID = $idVenta";
}

// Calcular el nuevo valor multiplicando "total" por "precio_producto"
$nuevoTotal = ($total/100)* $precioProducto;
$nuevoTotal=$total-$nuevoTotal;

// Actualizar el valor en la base de datos
$updateSql = "UPDATE venta SET DESCUENTO = ? WHERE ID = ?";
$updateStmt = $conn->prepare($updateSql);
$updateStmt->bind_param("di", $nuevoTotal, $idVenta);

if ($updateStmt->execute()) {
    echo "Total actualizado correctamente en la base de datos";
} else {
    echo "Error al actualizar el total en la base de datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
