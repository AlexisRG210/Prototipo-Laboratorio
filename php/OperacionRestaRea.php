<html lang="javascript">
<head>
        <title>Op. RestaR</title>
        <script src="../JavaSLibrary/Ajax.js"></script>
<head>
<?php

include('conexionmat.php');

$ClaveR= $_POST['ClaveR'];
$CantidadR= $_POST['CantidadR'];

/*Primera consulta para la cantidad de material */



/*Segunda consulta para la cantidad de envases de reactivo */

$sql1 = "SELECT Cantidad FROM reactivos WHERE ClaveR = '$ClaveR'";
$result1 = mysqli_query($conexion, $sql1);

/*Ahora a transformarlo en variable string*/

$CantidadRdb = $result1->fetch_array()[0] ?? '';

        if($CantidadR > $CantidadRdb){
        ?>
                

                <script src="solicitud.html">
                        alert("No hay reactivos, lo sentimos.");
                </script>


                <?php
        }else{

        $ResultadoReactivo = $CantidadRdb - $CantidadR;

             /*Aqui se hace la actualizacion de la base de datos */


        "UPDATE reactivos SET Cantidad = '$ResultadoReactivo' WHERE ClaverR = '$ClaveR'";
        mysqli_query($conexion, "UPDATE reactivos SET Cantidad = '$ResultadoReactivo' WHERE ClaveR = '$ClaveR'");
        mysqli_close($conexion);
        }
?>

</html>