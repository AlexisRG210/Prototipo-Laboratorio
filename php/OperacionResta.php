<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
<?php

include('conexionmat.php');

$ClaveM= $_POST['cMaterial'];
$CantidadM= $_POST['cantMaterial'];

$sql = "SELECT Cantidad FROM materiales WHERE ClaveIn = '$ClaveM'";
$result1 = mysqli_query($conexion, $sql);

$Cantidaddb = $result1->fetch_array()[0] ?? '';
   
        if($CantidadM > $Cantidaddb){
  ?>
        
                <script src="solicitud.html">
                        alert("No hay reactivos, lo sentimos.");
                </script>

                <?php
        }else{

        $ResultadoMaterial = $Cantidaddb - $CantidadM;

        "UPDATE materiales SET Cantidad = '$ResultadoMaterial' WHERE ClaveIn = '$ClaveM'";
        mysqli_query($conexion, "UPDATE materiales SET Cantidad = '$ResultadoMaterial' WHERE ClaveIn = '$ClaveM'");
        mysqli_close($conexion);

        }
?>


</body>
</html>
