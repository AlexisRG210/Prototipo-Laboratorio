<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Materiales | Lab. Química</title>
    <link rel="stylesheet" href="../estilos/style.css?v=2">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> </head>
<body id="body">

    <nav id="etiquetaCabeza">
        <ul class="menuH">
            <li><a href="../index.html">Inicio</a></li>
            <li class="dropdown">
                <a href="#">Operaciones</a>
                <ul class="menuV">
                    <li><a href="../php/solicitud.php">Solicitud</a></li>
                    <li><a href="../html/Devolver.html">Devolución</a></li>
                    <li><a href="../html/Agregar.html">Agregar</a></li>
                </ul>
            </li>
            <li><a href="../php/Inventario.php">Inventario</a></li>
            <li class="dropdown">
                <a href="#">Contactos</a>
                <ul class="menuV">
                    <li><a href="https://www.facebook.com/profile.php?id=100063971260450" target="_blank">Desarrolladores</a></li>
                    <li><a href="https://www.facebook.com/cetis99" target="_blank">Página Escuela</a></li>
                </ul>
            </li>
            <li><a href="https://www.cetis99.edu.mx/plantel/informacion" target="_blank">¿Quiénes Somos?</a></li>
        </ul>
    </nav>

    <div id="cuerpo">
        <div class="cabeza">
            <h1>LABORATORIO DE QUÍMICA</h1>
        </div>

        <div class="formQ">
            
            <div class="divFormulario">
                <form name="gyg" id="gyg" method="POST">
                    <section class="formulario">
                        <h2 class="titulos">PRÁCTICA</h2>
                        <input class="controles" type="text" name="grado" id="grado" required placeholder="Ingrese su grado">
                        <input class="controles" type="text" name="grupo" id="grupo" required placeholder="Ingrese su grupo">
                        <input class="controles" type="text" name="practica" id="practica" required placeholder="Práctica a realizar">
                        <input class="controles" type="text" name="hora" id="hora" required placeholder="Hora de la sesión">
                    </section>
                </form>
            </div>

            <div class="divFormulario2">
                <form name="form1" id="form1" method="post">
                    <section class="formulario2">
                        <h2 class="titulos">SELECCIONA TU MATERIAL</h2>
                        <input class="controle2" type="text" id="cMaterial" name="cMaterial" required placeholder="Clave del Material">
                        <input class="controle2" type="text" id="nMaterial" name="nMaterial" required placeholder="Nombre">
                        <input class="controle2" type="text" id="pMaterial" name="pMaterial" required placeholder="Medidas">
                        <input class="controle2" type="text" id="cantMaterial" name="cantMaterial" required placeholder="Cantidad">
                        
                        <div class="BtnAceptar">
                            <input type="button" class="botonAceptar" value="Agregar" onclick="agregar(); enMaterial();">
                        </div>
                        <div class="BtnReset">
                            <input class="botonReset" type="reset" value="Borrar">
                        </div>
                    </section> 
                </form>
            </div>

            <div class="divFormulario3"> 
                <form name="form2" id="form2" method="post">
                    <section class="formulario2">
                        <h2 class="titulos">REACTIVOS</h2>
                        <input class="controle2" type="text" id="ClaveR" name="ClaveR" required placeholder="Clave del Reactivo">
                        <input class="controle2" type="text" id="NombreR" name="NombreR" required placeholder="Nombre">
                        <input class="controle2" type="text" id="CantidadR" name="CantidadR" required placeholder="Cantidad">
                        <input class="controle2" type="text" id="Unidad" name="Unidad" required placeholder="Unidad (gr/ml)">
                        
                        <div class="BtnAceptar">
                            <input type="button" class="botonAceptar" value="Agregar" onclick="agregarReactivo(); enReactivo();">
                        </div>
                        <div class="BtnBorar">
                            <input class="botonesBorar" type="reset" value="Borrar">
                        </div>
                        
                        <button type="button" class="botonaceptar" onclick="borrartodo();">Generar vale de resguardo</button>
                    </section>
                </form>
            </div>

        </div> <div id="resultado" style="display:none;"></div>
    </div>

    <script>
        function enMaterial(){
           var datosM = $('#form1').serialize();
           $.ajax({
            data:datosM,
            url:'../php/OperacionResta.php',
            type:'POST',
            success: function (response){
              console.log("Material restado:", response);
            }
           });
        }

        function enReactivo(){
          var datosR = $('#form2').serialize();
          $.ajax({
            data:datosR,
            url:'../php/OperacionRestaRea.php',
            type:'POST',
            success: function (response){
              console.log("Reactivo restado:", response);
            }
          });
        }

        let arrinMaterial = [];
        let arripMaterial = [];
        let arricantMaterial = [];

        let arrinReactivo = [];
        let arriuReactivo = [];
        let arriCantidadR = [];

        function agregar(){
          let nMaterial = document.getElementById('nMaterial').value;
          arrinMaterial.push(nMaterial);
          let pMaterial = document.getElementById('pMaterial').value;
          arripMaterial.push(pMaterial);
          let cantMaterial = document.getElementById('cantMaterial').value;
          arricantMaterial.push(cantMaterial);
        }

        function agregarReactivo(){
          let NombreR = document.getElementById('NombreR').value;
          arrinReactivo.push(NombreR);
          let CantidadR = document.getElementById('CantidadR').value;
          arriCantidadR.push(CantidadR);
          let Unidad = document.getElementById('Unidad').value;
          arriuReactivo.push(Unidad);
        }
  
        function borrartodo(){
          let grupo = document.getElementById('grupo').value;
          let hora = document.getElementById('hora').value;
          let practica = document.getElementById('practica').value;
          let borrarCabeza = document.getElementById('etiquetaCabeza');
          let borrarCuerpo = document.getElementById('cuerpo');
          
          borrarCabeza.innerText="";
          borrarCuerpo.innerText="";

          let espacio  = document.getElementById('body');
          let divTabla = document.createElement('div');
          divTabla.setAttribute('id', 'divTabla');
          divTabla.setAttribute('class', 'divVale')
          espacio.appendChild(divTabla);

          espacio = document.getElementById('divTabla');
          let nuevoElemento = document.createElement('h5');
          nuevoElemento.setAttribute('class', 'h5Titulos');
          nuevoElemento.innerText = 'CENTRO DE ESTUDIOS TECNOLOGICOS INDUSTRIALES Y DE SERVICIOS No. 99';
          espacio.appendChild(nuevoElemento);

          nuevoElemento = document.createElement('h5');
          nuevoElemento.setAttribute('class', 'h5Titulos');
          nuevoElemento.innerText = 'YAUTEPEC, MORELOS';
          espacio.appendChild(nuevoElemento);

          nuevoElemento = document.createElement('h4');
          nuevoElemento.setAttribute('class', 'h5Titulos');
          nuevoElemento.style.marginBottom = "20px";
          nuevoElemento.innerText = 'VALE DE RESGUARDO DE LABORATORIOS DE QUÍMICA Y BIOLOGÍA';
          espacio.appendChild(nuevoElemento);

          // Contenedor de Metadata estructurada
          let divDatos = document.createElement('div');
          divDatos.setAttribute('class', 'divDatos');
          divDatos.innerHTML = `
            <div><strong>HORA/FECHA:</strong> ${hora}</div>
            <div><strong>GRUPO:</strong> ${grupo}</div>
            <div><strong>PRÁCTICA:</strong> ${practica}</div>
            <div><strong>DOCENTE:</strong> ___________________________</div>
          `;
          espacio.appendChild(divDatos);

          // Tabla del Vale
          let tabla = document.createElement('table');
          tabla.setAttribute('class', 'tablaVale');
          tabla.innerHTML = `
            <thead>
                <tr>
                    <th>NP</th>
                    <th>MATERIAL SOLICITADO</th>
                    <th>CANTIDAD</th>
                    <th>MEDIDAS</th>
                    <th>REACTIVOS</th>
                </tr>
            </thead>
            <tbody id="crearTabla"></tbody>
          `;
          espacio.appendChild(tabla);
          
          let espacioTabla = document.getElementById('crearTabla');
          let cantidad = arrinMaterial.length;

          for(var i = 0; i < cantidad; i++){
            let rName = arrinReactivo[i] ? `${arrinReactivo[i]} (${arriCantidadR[i]} ${arriuReactivo[i]})` : '---';
            let row = `
                <tr>
                    <td>${i + 1}</td>
                    <td>${arrinMaterial[i]}</td>
                    <td>${arricantMaterial[i]}</td>
                    <td>${arripMaterial[i]}</td>
                    <td>${rName}</td>
                </tr>
            `;
            espacioTabla.innerHTML += row;
          }

          // Si hay más reactivos que materiales, mapeamos los restantes
          if(arrinReactivo.length > cantidad) {
             for(var i = cantidad; i < arrinReactivo.length; i++) {
                let row = `<tr><td>${i + 1}</td><td>---</td><td>---</td><td>---</td><td>${arrinReactivo[i]} (${arriCantidadR[i]} ${arriuReactivo[i]})</td></tr>`;
                espacioTabla.innerHTML += row;
             }
          }

          let btnPrint = document.createElement('input');
          btnPrint.setAttribute('type', 'button');
          btnPrint.setAttribute('onclick', 'window.print()');
          btnPrint.setAttribute('class', 'botonaceptar');
          btnPrint.setAttribute('value', '🖨️ Imprimir Vale de Resguardo');
          btnPrint.style.marginTop = "30px";
          espacio.appendChild(btnPrint);
        }
    </script>
</body>
</html>