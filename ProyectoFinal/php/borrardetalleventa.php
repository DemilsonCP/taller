<?php
    $nombre = $_POST["ID"];
    $mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
    if (mysqli_connect_errno())
    {
        printf("MySQL connection failed with the error: %s", mysqli_connect_error());
        exit;
    }
   
    $delete_query = "DELETE FROM detalle_venta WHERE `IDvta` = $nombre";// esta funcion es para borrar
    
    // run the update query 
    If (mysqli_query($mysqli_link, $delete_query)) {
        header("Location:../html/borrarventa.html");
        exit;
    }
    else{
        echo "No se encontro";
    }
    
    // close the db connection 
    mysqli_close($mysqli_link);
?>