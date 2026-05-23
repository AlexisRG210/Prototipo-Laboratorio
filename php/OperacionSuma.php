<html >
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<scrip language="javasript">
<head>
    
    <title>Devolución</title>

    <link rel="stylesheet" href="../estilos/styleV.css">

</head>
<body>
<?php

include('conexionmat.php');

/*Segunda tabla de la solicitud (Seleccion de los materiales) */

$ClaveM= $_POST['ClaveM'];
$CantidadM= $_POST['Dev'];


$sql = "SELECT Cantidad FROM materiales WHERE ClaveIn = '$ClaveM'";
$result1 = mysqli_query($conexion, $sql);

$CantidadMdb = $result1 -> fetch_array()[0] ?? '';



        $ResultadoMaterial = $CantidadMdb + $CantidadM;

        "UPDATE materiales SET Cantidad = '$ResultadoMaterial' WHERE ClaveIn = '$ClaveM'";
        mysqli_query($conexion, "UPDATE materiales SET Cantidad = '$ResultadoMaterial' WHERE ClaveIn = '$ClaveM'");
        $Nombre = mysqli_query($conexion, "SELECT Nombre FROM materiales WHERE ClaveIn = '$ClaveM'");
        mysqli_close($conexion);

        $NombreDB = $Nombre->fetch_array()[0] ?? '';
        
        ?>  
        <h1 class="mensaje">Se ha hecho la devolución de los materiales</h1>
        <h1><?php echo "La cantidad regresada es de: "?></h1>
        <br>
        <h1><?php echo $CantidadM ?></h1>
        <br>
        <h1><?php echo " Del material: "?></h1>
        <br>
        <h1><?php echo $NombreDB ?></h1>
        <input type="button" class="btn" onclick="history.back()" name="Regresar" value="regresar" >
    </body>
</html>