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
                <li><a href="../php/Inventario.php">Inventario</a></li>
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

<?php
    $Select = $_POST['Seleccionar'];

    if($Select == "material" || $Select == "Material" || $Select == "MATERIAL"|| $Select == 'm' || $Select == 'M'){
        ?>
        <form name="form1" id="form1" method="POST" action="AgregarMat.php">
        <div class="contenedor"> 
        <div class="SELECCION">
            <section class="Seleccionar">
                <h4 class="titulos">MATERIAL</h4>
                    <input class="controles" type="text" name="claveM" id="claveM" placeholder="Clave">
                    <input class="controles" type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <input class="controles" type="text" name="presentacion" id="presentacion" placeholder="Presentacion">
                    <input class="controles" type="text" name="cantidad" id="cantidad" placeholder="Cantidad">
            <div class="BtnAceptar">
                <input class="botonAceptar" type="submit" value="Aceptar">
            </div>
            <div class="BtnBorar">
                <input class="botonesBorar" type="reset" value="Borrar">
            </div>        
            </section>
        </div>
        </div>
        </form>
    <?php
    }if($Select == "reactivo" || $Select == "Reactivo" || $Select == "REACTIVO"|| $Select == 'r' || $Select == 'R'){
        ?>
        <form name="form1" id="form1" method="POST" action="AgregarReac.php">
        <div class="contenedor"> 
        <div class="SELECCION">
            <section class="Seleccionar">
                <h4 class="titulos">REACTIVO</h4>
                    <input class="controles" type="text" name="claveR" id="claveR" placeholder="Clave">
                    <input class="controles" type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <input class="controles" type="number" name="envases" id="envases" placeholder="Envases">
                    <input class="controles" type="number" name="cantidad" id="cantidad" placeholder="Cantidad">
                    <input class="controles" type="text" name="unidades" id="unidades" placeholder="Unidades">
                    <input class="controles" type="date" name="fecha" id="fecha" placeholder="Fecha de caducidad">
            <div class="BtnAceptar">
                <input class="botonAceptar" type="submit" value="Aceptar">
            </div>
            <div class="BtnBorar">
                <input class="botonesBorar" type="reset" value="Borrar">
            </div>        
            </section>
        </div>
        </div>
        </form>
        <?php
    }
    ?>
</body>
</html>