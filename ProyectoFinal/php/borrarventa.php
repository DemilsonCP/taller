<?php
    $nombre = $_POST["nombre"];
    $mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
    if (mysqli_connect_errno())
    {
        printf("MySQL connection failed with the error: %s", mysqli_connect_error());
        exit;
    }
   
    $delete_query = "DELETE FROM venta WHERE `ID` = $nombre";// esta funcion es para borrar
    
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
 <script>alert("Se elimino correctamente");</script>
