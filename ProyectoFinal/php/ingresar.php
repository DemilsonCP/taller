<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

$Nombre = $_POST["Nombre"];
$Contraseña = $_POST["Contraseña"];

// Evita la inyección SQL utilizando mysqli_real_escape_string
$Nombre = mysqli_real_escape_string($mysqli_link, $Nombre);
$Contraseña = mysqli_real_escape_string($mysqli_link, $Contraseña);

// Consulta para verificar si el nombre de usuario y contraseña coinciden
$query = "SELECT * FROM `regsitro` WHERE `NOMBRE`='$Nombre' AND `CONTRA`=MD5('$Contraseña')";

$result = mysqli_query($mysqli_link, $query);

if ($result) {
    // Verifica si se encontraron filas en el resultado
    if (mysqli_num_rows($result) > 0) {
        // El nombre de usuario y contraseña son válidos
        // Puedes redirigir al usuario o realizar otras acciones aquí
        echo '<script>alert("Bienvenido"); window.location.href="../html/indexsegunda.html";</script>';
        exit;
    } else {
        // No se encontraron coincidencias, el usuario no existe o la contraseña es incorrecta
        echo '<script>alert("Lo siento, no estás registrado."); window.location.href="../html/index.html";</script>';

    }
} else {
    // Manejo de errores si la consulta falla
    echo "Error en la consulta: " . mysqli_error($mysqli_link);
}

mysqli_close($mysqli_link);
?>
