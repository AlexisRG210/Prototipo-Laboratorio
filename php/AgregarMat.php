<?php

include('conexionmat.php');

$Clave = $_POST['claveM'];
$Nombre = $_POST['nombre'];
$Presentacion = $_POST['presentacion'];
$Cantidad = $_POST['cantidad'];

$agregar = "INSERT INTO materiales VALUES ('$Clave', '$Nombre', '$Presentacion', '$Cantidad')";
mysqli_query($conexion, $agregar);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/styleadd.css">
</head>
<body>
<nav>
            <ul class="menuH">
                <li><a href="../index.html">Inicio</a></li>
                <li>
                    <a href="#">Operaciones</a>
                    <ul class="menuV">
                        <li><a href="../php/solicitud.php">Solicitud</a></li>
                        <li><a href="../html/Devolver.html">Devolución</a></li>
                        <li><a href="../html/Agregar.html">Agregar</a></li>
                    </ul>
                </li>
                <li><a href="#">Inventario</a></li>
                <li>
                    <a href="#">Contactos</a>
                    <ul class="menuV">
                        <li><a href="https://www.facebook.com/profile.php?id=100063971260450">Desarrolladores</a></li>
                        <li><a href="https://www.facebook.com/cetis99">Página Escuela</a></li>
                    </ul>
                </li>
                <li><a href="https://www.cetis99.edu.mx/plantel/informacion">¿Quienes somos?</a></li>
            </ul>
        </nav>
    <h1 class="titulo">Su material ya fue registrada</h1>
</body>
</html>
