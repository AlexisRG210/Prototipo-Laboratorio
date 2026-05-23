<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Solicitud</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" media="print" href="../estilos/print.css">
    
    <script src="../JavaSLibrary/Ajax.js"></script>

  </head>
  <body background="../imagenes/fondo.png" id="body">
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
    <div id="cuerpo">
      <div class="cabeza">
        <h1>LABORATORIOS DE QUÍMICA</h1>
      </div>
      <form id="mandar" name="mandar" method="post">
      <div class="formQ">
        <form name="gyg" id="gyg" method="POST" ;>
        <div class="divFormulario">
          <section class="formulario">
            <h2 class="titulos">PRÁCTICA</h2>
            <input class="controles" type="text" name="grado" id="grado" required="required" placeholder="Ingrese su grado ">
            <input class="controles" type="text" name="grupo" id="grupo" required="required" placeholder="Ingrese su grupo ">
            <input class="controles" type="text" name="practica" id="practica" required="required" placeholder="Práctica">
            <input class="controles" type="text" name="hora" id="hora" required="required" placeholder="Hora a realizar">
          </section>
      </div>
      </form>
      <form name="form1" id="form1" method="post">
      <div class="divFormulario2">
          <section class="formulario2">
            <h2 class="titulos">SELECCIONA TU MATERIAL</h2>
            <input class="controle2" type="text" id="cMaterial" name="cMaterial" required="required" placeholder="Clave del Material">
            <input class="controle2" type="text" id="nMaterial" name="nMaterial" required="required" placeholder="Nombre" >
            <input class="controle2" type="text" id="pMaterial" name="pMaterial" required="required" placeholder="Medidas">
            <input class="controle2" type="text" id="cantMaterial" name="cantMaterial" required="required" placeholder="Cantidad">
            <div class="BtnAceptar">
              <input type="button" class="botonAceptar" value="Agregar" onclick="agregar(); enMaterial();">
            </div>
            <div class="BtnReset">
              <input class="botonReset" type="reset" value="Borrar">
            </div>
          </section> 
      </div>
      </form>
      <form name="form2" id="form2" method="post">
      <div class="divFormulario3"> 
          <section class="formulario2">
            <h2 class="titulos">REACTIVOS</h2>
            <input class="controle2" type="text" id="ClaveR" name="ClaveR" required="required" placeholder="Clave del Reactivo">
            <input class="controle2" type="text" id="NombreR" name="NombreR" required="required" placeholder="Nombre" >
            <input class="controle2" type="text" id="CantidadR" name="CantidadR" required="required" placeholder="Cantidad">
            <input class="controle2" type="text" id="Unidad" name="Unidad" required="required" placeholder="Unidad">
            <div class="BtnAceptar">
              <input type="button" class="botonAceptar" value="Agregar" onclick="agregarReactivo(); enReactivo();">
            </div>
            <div class="BtnBorar">
              <input class="botonesBorar" type="reset" value="Borrar">
              </div>
              <button class="botonaceptar" onclick="borrartodo();">Generar vale</button>
            </section>
        </div>
        </form>
      </div>
      </form>
  </div>
    <script>
        function enMaterial(cMaterial, nMaterial){

  
           var datosM = $('#form1').serialize();
           $.ajax({
            data:datosM,
            url:'../php/OperacionResta.php',
            type:'POST',
            beforeSend: function(){
              $("#resultado").html("Procesando");
            },
            success: function (response){
              $("#resultado").html(response);
            }
           });
          }

  
        function enReactivo(ClaveR, CantidadR){
          var datosR = $('#form2').serialize();
          $.ajax({
            data:datosR,
            url:'../php/OperacionRestaRea.php',
            type:'POST',
            beforeSend: function (){
              $("#resultado").html("Procesando");
            },
            success: function (response){
              $("#resultado").html(response);
            }
          });
          
        }

        window.onload = function(){
            
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
          console.log(nMaterial);

          let pMaterial = document.getElementById('pMaterial').value;
          arripMaterial.push(pMaterial);
          console.log(pMaterial);

          let cantMaterial = document.getElementById('cantMaterial').value;
          arricantMaterial.push(cantMaterial);
          console.log(cantMaterial);
        }

        
        function agregarReactivo(){
          
          let NombreR = document.getElementById('NombreR').value;
          arrinReactivo.push(NombreR);
          console.log(NombreR);
          
          let CantidadR = document.getElementById('CantidadR').value;
          arriCantidadR.push(CantidadR);
          console.log(CantidadR);

          let Unidad = document.getElementById('Unidad').value;
          arriuReactivo.push(Unidad);
          console.log(Unidad);
          
        }
  
        function borrartodo(){
          let grupo = document.getElementById('grupo').value;
          let hora = document.getElementById('hora').value;
          let practica = document.getElementById('practica').value;
          let borrarCabeza = document.getElementById('etiquetaCabeza');
          let borrarCuerpo = document.getElementById('cuerpo');
          let nombrePractica = document.getElementById('practica').value;
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
          nuevoElemento.innerText = 'CENTRO DE ESTUDIOS TECNOLOGICOS INDUSTRIALES Y DE SERVICIOS No99';
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divTabla');
          nuevoElemento = document.createElement('h5');
          nuevoElemento.setAttribute('class', 'h5Titulos');
          nuevoElemento.innerText = 'YAUTEPEC MOTELOS';
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divTabla');
          nuevoElemento = document.createElement('h4');
          nuevoElemento.setAttribute('class', 'h5Titulos');
          nuevoElemento.innerText = 'VALE DE RESGUARDO DE LABORATORIOS DE QUIMICA Y BIOLOGIA';
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divTabla');
          nuevoElemento = document.createElement('div');
          nuevoElemento.setAttribute('id', 'divDatos');
          nuevoElemento.setAttribute('class', 'divDatos');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divDatos');
          nuevoElemento = document.createElement('div');
          nuevoElemento.setAttribute('id', 'divFecha');
          nuevoElemento.setAttribute('class', 'divFecha');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divFecha');
          nuevoElemento = document.createElement('h5');
          nuevoElemento.innerText = 'FECHA';
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divFecha');
          nuevoElemento = document.createElement('p');
          nuevoElemento.innerText = hora;
          espacio.appendChild(nuevoElemento);

          
          espacio = document.getElementById('divDatos');
          nuevoElemento = document.createElement('div');
          nuevoElemento.setAttribute('id', 'divGrupo');
          nuevoElemento.setAttribute('class', 'divGrupo');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divGrupo');
          nuevoElemento = document.createElement('h5');
          nuevoElemento.innerText = 'GRUPO';
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divGrupo');
          nuevoElemento = document.createElement('p');
          nuevoElemento.innerText = grupo;
          espacio.appendChild(nuevoElemento);
          

          espacio = document.getElementById('divDatos');
          nuevoElemento = document.createElement('div');
          nuevoElemento.setAttribute('id', 'divMateria');
          nuevoElemento.setAttribute('class', 'divMateria');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divMateria');
          nuevoElemento = document.createElement('h5');
          nuevoElemento.innerText = 'MATERIA';
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divMateria');
          nuevoElemento = document.createElement('input');
          nuevoElemento.setAttribute('type', 'text');
          espacio.appendChild(nuevoElemento);


          espacio = document.getElementById('divDatos');
          nuevoElemento = document.createElement('div');
          nuevoElemento.setAttribute('id', 'divDocente');
          nuevoElemento.setAttribute('class', 'divDocente');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divDocente');
          nuevoElemento = document.createElement('h5');
          nuevoElemento.innerText = 'DOCENTE';
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divDocente');
          nuevoElemento = document.createElement('input');
          nuevoElemento.setAttribute('type', 'text');
          espacio.appendChild(nuevoElemento);


          espacio = document.getElementById('divDatos');
          nuevoElemento = document.createElement('div');
          nuevoElemento.setAttribute('id', 'divNombrePractica');
          nuevoElemento.setAttribute('class', 'divNombrePractica');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divNombrePractica');
          nuevoElemento = document.createElement('h5');
          nuevoElemento.innerText = 'NOMBRE PRACTICA';
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('divNombrePractica');
          nuevoElemento = document.createElement('p');
          nuevoElemento.innerText = practica;
          espacio.appendChild(nuevoElemento);


          espacio = document.getElementById('divTabla');
          nuevoElemento = document.createElement('table');
          nuevoElemento.setAttribute('id', 'tablaVale');
          nuevoElemento.setAttribute('class', 'tablaVale');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('tablaVale');
          nuevoElemento = document.createElement('thead');
          nuevoElemento.setAttribute('id', 'thead');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('thead');
          nuevoElemento = document.createElement('tr');
          nuevoElemento.setAttribute('id', 'theadTR');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('theadTR');
          nuevoElemento = document.createElement('th');
          nuevoElemento.innerText = 'NP';
          nuevoElemento.setAttribute('class', 'np');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('theadTR');
          nuevoElemento = document.createElement('th');
          nuevoElemento.innerText = 'MATERIAL SOLICITADO';
          nuevoElemento.setAttribute('class', 'materialSolicitado');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('theadTR');
          nuevoElemento = document.createElement('th');
          nuevoElemento.innerText = 'CANTIDAD';
          nuevoElemento.setAttribute('class', 'cantidad');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('theadTR');
          nuevoElemento = document.createElement('th');
          nuevoElemento.innerText = 'MEDIDAS';
          nuevoElemento.setAttribute('class', 'medidas');
          espacio.appendChild(nuevoElemento);

          espacio = document.getElementById('theadTR');
          nuevoElemento = document.createElement('th');
          nuevoElemento.innerText = 'REACTIVOS';
          nuevoElemento.setAttribute('class', 'reactivos');
          espacio.appendChild(nuevoElemento);


          espacio = document.getElementById('tablaVale');
          nuevoElemento = document.createElement('tbody');
          nuevoElemento.setAttribute('id', 'crearTabla');
          espacio.appendChild(nuevoElemento);
          
          let espacioTabla = document.getElementById('crearTabla');
          espacioTabla.innerHTML="";
          let cantidad = arrinMaterial.length;
          let cantidadReactivo = arrinReactivo.length;
          var suma = 0;

          for(var i = 0; i < cantidad; i++){
            suma += 1;
            let newRow = espacioTabla.insertRow(-1);
            newRow.setAttribute('id' , suma);
            newRow.insertCell(0).innerText = suma;
            espacioTabla.appendChild(newRow);


            fila = document.getElementById(suma);
            celda = document.createElement('td');
            celda.innerText = arrinMaterial[i];
            fila.appendChild(celda);

            fila = document.getElementById(suma);
            celda = document.createElement('td');
            celda.innerText = arricantMaterial[i];
            fila.appendChild(celda);

            fila = document.getElementById(suma);
            celda = document.createElement('td');
            celda.innerText = arripMaterial[i];
            fila.appendChild(celda);
          }


          
          let primerdatoReactivo = arrinReactivo[0];
          var i = 0;
          var sumaR = 1;
          while(i < cantidadReactivo){
            let filaRef = document.getElementById(sumaR);
            let nuevaCelda = document.createElement('td');
            nuevaCelda.innerText = arrinReactivo[i] + " " + arriCantidadR[i] + " " + arriuReactivo[i];
            filaRef.appendChild(nuevaCelda);
            i += 1;
            sumaR += 1;
          } 
          espacio = document.getElementById('divTabla');
          nuevoElemento = document.createElement('input');
          nuevoElemento.setAttribute('type', 'button');
          nuevoElemento.setAttribute('name', 'imprimir');
          nuevoElemento.setAttribute('id', 'imprimir');
          nuevoElemento.setAttribute('onclick', 'javascript:window.print()');
          nuevoElemento.setAttribute('class', 'btnImprimir');
          nuevoElemento.setAttribute('value', 'imprimir');
          espacio.appendChild(nuevoElemento);
        }
    </script>
  </body>
</html>
