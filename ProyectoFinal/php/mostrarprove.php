<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            text-align: center; 
            margin: 0 auto; 

        }

        table, th, td {
            border: 1px solid #ccc;

            
        }

        th, td {
            padding: 8px;
            text-align: left;
            width: 40px;
            text-align: center;

        }
        td:hover {
            background-color: burlywood;
        }

        th {
            background-color: burlywood;
            font-size: 20px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h1{
            color: black;
            text-align: center;
        }
        h1:hover{
            color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de los Provedores</h1>
</body>

<?php
$mysqli_link = mysqli_connect("localhost", "root", "", "sistema_venta");
if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
$select_query = "SELECT * FROM proveedor LIMIT 10";
$result = mysqli_query($mysqli_link, $select_query);

   echo "<table>";
   echo "<tr><th>Rut</th><th>Nombre</th><th>Telefono</th><th>Web</th><th>Direccion</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['RUT'] . "</td>";
    echo "<td>" . $row['NOMBRE'] . "</td>";
    echo "<td>" . $row['TELEFONO'] . "</td>";
    echo "<td>" . $row['WEB'] . "</td>";  
    echo "<td>" . $row['DIRECCION'] . "</td>";
    echo "<tr>";
    
}
    echo "</table>";
// close the db connection
mysqli_close($mysqli_link);
