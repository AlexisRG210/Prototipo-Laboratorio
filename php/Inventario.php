<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <head>
        <title>
            Inventario
        </title>
        <link rel="stylesheet" href="../estilos/stylein.css">        
    </head>
    <body>
    <nav id="etiquetaCabeza">
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
        
        <!--Seleccion de materiales y reactivos en cero -->
        <h1>
            <center>
                NO DISPONIBLES
            </center>
        </h1>
        <!--Inventario de reactivos-->
        <div class="T">
        <h1 class="Mat">
            Materiales.
        </h1>
        <h1 class="Reac">
            Reactivos.
        </h1>
        </div>
        <div class="In">
        <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Presentación</th>
                    <th>Cantidad</th>
                </tr>
                <?php
                include("conexionmat.php");
                $sql="SELECT * FROM materiales WHERE Cantidad ='0'";
                $result=mysqli_query($conexion,$sql);

                while($mostrar=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <th><?php echo $mostrar['ClaveIn'] ?></th>
                    <th><?php echo $mostrar['Nombre'] ?></th>
                    <th><?php echo $mostrar['Presentacion'] ?></th>
                    <th><?php echo $mostrar['Cantidad'] ?></th>
                </tr>
                <?php
            }
            ?>
            </thead>
        </table>
        </div>
        <div class="container2">
            <table>
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Envases</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>
                        <th>Fecha de Caducidad</th> 
                    </tr>
                    <?php
                    include("conexionmat.php");
                    $sql="SELECT * FROM reactivos WHERE Cantidad = '0'";
                    $result=mysqli_query($conexion,$sql);

                    while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <th><?php echo $mostrar['ClaveR'] ?></th>
                        <th><?php echo $mostrar['Nombre'] ?></th>
                        <th><?php echo $mostrar['Envases'] ?></th>
                        <th><?php echo $mostrar['Cantidad'] ?></th>
                        <th><?php echo $mostrar['Unidades'] ?></th>
                        <th><?php echo $mostrar['Fecha de caducidad'] ?></th>
                    </tr>
                    <?php
                    }
                    ?>

                </thead>
            </table>
        </div>
        </div>      
        <h1>
            <center>
                DISPONIBLES
            </center>
        </h1>
        <div class="In">
        <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Presentación</th>
                    <th>Cantidad</th>
                </tr>
                <?php
                include("conexionmat.php");
                $sql="SELECT * FROM materiales WHERE Cantidad !='0'";
                $result=mysqli_query($conexion,$sql);

                while($mostrar=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <th><?php echo $mostrar['ClaveIn'] ?></th>
                    <th><?php echo $mostrar['Nombre'] ?></th>
                    <th><?php echo $mostrar['Presentacion'] ?></th>
                    <th><?php echo $mostrar['Cantidad'] ?></th>
                </tr>
                <?php
            }
            ?>
            </thead>
        </table>
        </div>
        <div class="container2">
            <table>
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Envases</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>
                        <th>Fecha de Caducidad</th> 
                    </tr>
                    <?php
                    include("conexionmat.php");
                    $sql="SELECT * FROM reactivos WHERE Cantidad != '0'";
                    $result=mysqli_query($conexion,$sql);

                    while($mostrar=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <th><?php echo $mostrar['ClaveR'] ?></th>
                        <th><?php echo $mostrar['Nombre'] ?></th>
                        <th><?php echo $mostrar['Envases'] ?></th>
                        <th><?php echo $mostrar['Cantidad'] ?></th>
                        <th><?php echo $mostrar['Unidades'] ?></th>
                        <th><?php echo $mostrar['Fecha de caducidad'] ?></th>
                    </tr>
                    <?php
                    }
                    ?>

                </thead>
            </table>
        </div>
        </div>  
    </body>
</html>