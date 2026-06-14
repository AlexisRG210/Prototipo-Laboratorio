<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario General | Lab. Química</title>
    <link rel="stylesheet" href="../estilos/stylein.css?v=9">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>

    <nav id="etiquetaCabeza">
        <ul class="menuH">
            <li><a href="../index.html"><i data-lucide="home" style="width:14px; height:14px;"></i> Inicio</a></li>
            <li class="dropdown">
                <button class="nav-btn">
                    <i data-lucide="beaker" style="width:14px; height:14px;"></i> Operaciones <i data-lucide="chevron-down" style="width:10px; height:10px;"></i>
                </button>
                <ul class="menuV">
                    <div class="menuV-content">
                        <li><a href="../php/solicitud.php">Solicitud</a></li>
                        <li><a href="../html/Devolver.html">Devolución</a></li>
                        <li><a href="../html/Agregar.html">Agregar</a></li>
                    </div>
                </ul>
            </li>
            <li><a href="../php/Inventario.php"><i data-lucide="clipboard-list" style="width:14px; height:14px;"></i> Inventario</a></li>
            <li class="dropdown">
                <button class="nav-btn">
                    <i data-lucide="users" style="width:14px; height:14px;"></i> Contactos <i data-lucide="chevron-down" style="width:10px; height:10px;"></i>
                </button>
                <ul class="menuV">
                    <div class="menuV-content">
                        <li><a href="https://www.facebook.com/profile.php?id=100063971260450" target="_blank">Desarrolladores</a></li>
                        <li><a href="https://www.facebook.com/cetis99" target="_blank">Página Escuela</a></li>
                    </div>
                </ul>
            </li>
            <li><a href="https://www.cetis99.edu.mx/plantel/informacion" target="_blank"><i data-lucide="info" style="width:14px; height:14px;"></i> ¿Quiénes Somos?</a></li>
        </ul>
    </nav>

    <div id="cuerpo">
        <div class="cabeza">
            <h1>SISTEMA CENTRAL DE INVENTARIOS</h1>
        </div>

        <div class="search-wrapper">
            <div class="search-icon-inside">
                <i data-lucide="search" style="width: 18px; height: 18px;"></i>
            </div>
            <input type="text" id="inventarioSearch" class="modern-search" placeholder="Buscar componentes o sustancias en tiempo real..." onkeyup="ejecutarFiltro()">
        </div>

        <div class="inventory-tabs">
            <button id="tab-materiales-btn" class="tab-control-btn" onclick="activarInventario('tabla-materiales', this)">
                <i data-lucide="box" style="width: 16px; height: 16px;"></i> Materiales
            </button>
            <button id="tab-reactivos-btn" class="tab-control-btn" onclick="activarInventario('tabla-reactivos', this)">
                <i data-lucide="flask-round" style="width: 16px; height: 16px;"></i> Reactivos
            </button>
        </div>

        <div class="scrollable-table-card">
            
            <div id="placeholder-vacio" class="empty-state-placeholder">
                <i data-lucide="database-backup" style="width: 48px; height: 48px;"></i>
                <p>Seleccione una categoría superior para desplegar las bitácoras de existencias de almacén.</p>
            </div>

            <table class="premium-table" id="tabla-materiales">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Descripción del Material</th>
                        <th>Presentación</th>
                        <th style="text-align: center;">Existencias</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("conexionmat.php");
                    // Ejecutamos la consulta ordenando alfabéticamente por Nombre
                    $sql = "SELECT * FROM materiales ORDER BY Nombre ASC";
                    $result = mysqli_query($conexion, $sql);
                    while($mostrar = mysqli_fetch_array($result)){
                        $badgeClass = ($mostrar['Cantidad'] == '0') ? 'stock-badge red' : 'stock-badge green';
                    ?>
                    <tr class="fila-busqueda">
                        <td class="key-index"><?php echo $mostrar['ClaveIn'] ?></td>
                        <td class="name-index"><strong><?php echo $mostrar['Nombre'] ?></strong></td>
                        <td><?php echo $mostrar['Presentacion'] ?></td>
                        <td style="text-align: center;"><span class="<?php echo $badgeClass; ?>"><?php echo $mostrar['Cantidad'] ?></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <table class="premium-table" id="tabla-reactivos">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre Químico</th>
                        <th>Envases</th>
                        <th>Cantidad</th>
                        <th>Control Caducidad</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ejecutamos la consulta ordenando alfabéticamente por Nombre
                    $sql = "SELECT * FROM reactivos ORDER BY Nombre ASC";
                    $result = mysqli_query($conexion, $sql);
                    while($mostrar = mysqli_fetch_array($result)){
                        $badgeClass = ($mostrar['Cantidad'] == '0') ? 'stock-badge red' : 'stock-badge green';
                    ?>
                    <tr class="fila-busqueda">
                        <td class="key-index"><?php echo $mostrar['ClaveR'] ?></td>
                        <td class="name-index"><strong><?php echo $mostrar['Nombre'] ?></strong></td>
                        <td><?php echo $mostrar['Envases'] ?></td>
                        <td><span class="<?php echo $badgeClass; ?>"><?php echo $mostrar['Cantidad'] ?> <?php echo $mostrar['Unidades'] ?></span></td>
                        <td style="color:#00d9f5; font-family:monospace; font-size:12px;"><?php echo $mostrar['Fecha de caducidad'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="empty-search-msg" id="msg-error-filtro">No se encontraron registros que coincidan con la búsqueda.</div>

        </div> </div>

    <script>
        lucide.createIcons();

        // Control y renderizado de tablas dinámicas mediante clics
        function activarInventario(tableId, btnElement) {
            // Ocultamos el mensaje inicial plano
            document.getElementById('placeholder-vacio').style.display = 'none';
            document.getElementById('msg-error-filtro').style.display = 'none';

            // Apagamos todas las tablas y removemos el estado de los botones
            document.querySelectorAll('.premium-table').forEach(tbl => tbl.classList.remove('active-table'));
            document.querySelectorAll('.tab-control-btn').forEach(btn => btn.classList.remove('active'));
            
            // Encendemos la tabla seleccionada y el botón correspondiente
            document.getElementById(tableId).classList.add('active-table');
            btnElement.classList.add('active');
            
            // Reseteamos el campo de búsqueda para evitar incongruencias de visualización
            document.getElementById('inventarioSearch').value = '';
            
            // Forzamos a mostrar todas las filas de la tabla activada
            let activeTable = document.getElementById(tableId);
            activeTable.querySelectorAll('.fila-busqueda').forEach(row => row.style.display = "");
        }

        // Algoritmo de filtrado asíncrono con normalización Unicode (Insensible a mayúsculas y tildes)
        function ejecutarFiltro() {
            let userInput = document.getElementById('inventarioSearch').value;
            let cleanFilter = userInput.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
            
            // Buscamos la tabla activa en la pantalla
            let activeTable = document.querySelector('.premium-table.active-table');
            if(!activeTable) return; // Si no hay tabla seleccionada, no hace nada

            let rows = activeTable.querySelectorAll('.fila-busqueda');
            let matchesCounter = 0;
            
            rows.forEach(row => {
                let textClave = row.querySelector('.key-index').textContent.toLowerCase();
                let textNombre = row.querySelector('.name-index').textContent.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
                
                if (textClave.includes(cleanFilter) || textNombre.includes(cleanFilter)) {
                    row.style.display = "";
                    matchesCounter++;
                } else {
                    row.style.display = "none";
                }
            });
            
            // Manejo del mensaje de "Sin resultados"
            let errorMsg = document.getElementById('msg-error-filtro');
            if (matchesCounter === 0 && cleanFilter !== "") {
                errorMsg.style.display = "block";
            } else {
                errorMsg.style.display = "none";
            }
        }
    </script>
</body>
</html>