<?php
    $nombre = $_POST["nombre"];
    $mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
    if (mysqli_connect_errno())
    {
        printf("MySQL connection failed with the error: %s", mysqli_connect_error());
        exit;
    }
   
    $delete_query = "DELETE FROM cliente WHERE `RUT` = $nombre";// esta funcion es para borrar
    
    // run the update query 
    If (mysqli_query($mysqli_link, $delete_query)) {
        echo 'Se elimino correctamente.';
    }
    else{
        echo "No se encontro";
    }
    
    // close the db connection 
    mysqli_close($mysqli_link);
?>