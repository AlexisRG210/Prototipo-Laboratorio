<?php
include('conexionmat.php');

$Clave = $_POST['claveR'];
$Nombre = $_POST['nombre']; // 🔥 CORREGIDO: Ahora sí toma el string del nombre enviado por el formulario
$Envases = $_POST['envases'];
$Cantidad = $_POST['cantidad'];
$Unidades = $_POST['unidades'];
$FechaCad = $_POST['fecha'];

$agregar = "INSERT INTO reactivos VALUES ('$Clave', '$Nombre', '$Envases', '$Cantidad', '$Unidades', '$FechaCad')";
mysqli_query($conexion, $agregar);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso | Lab. Química</title>
    <link rel="stylesheet" href="../estilos/style.css?v=5">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .success-card {
            max-width: 500px;
            margin: 60px auto 0 auto;
            text-align: center;
        }
        .success-icon {
            width: 64px;
            height: 64px;
            background-color: rgba(0, 217, 245, 0.1);
            color: var(--cyan);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 20px auto;
            border: 1px solid rgba(0, 217, 245, 0.2);
        }
    </style>
</head>
<body>
    <nav>
        <ul class="menuH">
            <li><a href="../index.html"><i data-lucide="home" style="width:14px; height:14px; margin-right:4px;"></i> Inicio</a></li>
            <li class="dropdown">
                <a href="#"><i data-lucide="beaker" style="width:14px; height:14px; margin-right:4px;"></i> Operaciones</a>
                <ul class="menuV">
                    <div class="menuV-content">
                        <li><a href="../php/solicitud.php">Solicitud</a></li>
                        <li><a href="../html/Devolver.html">Devolución</a></li>
                        <li><a href="../html/Agregar.html">Agregar</a></li>
                    </div>
                </ul>
            </li>
            <li><a href="../php/Inventario.php"><i data-lucide="clipboard-list" style="width:14px; height:14px; margin-right:4px;"></i> Inventario</a></li>
            <li class="dropdown">
                <a href="#"><i data-lucide="users" style="width:14px; height:14px; margin-right:4px;"></i> Contactos</a>
                <ul class="menuV">
                    <div class="menuV-content">
                        <li><a href="https://www.facebook.com/profile.php?id=100063971260450" target="_blank">Desarrolladores</a></li>
                        <li><a href="https://www.facebook.com/cetis99" target="_blank">Página Escuela</a></li>
                    </div>
                </ul>
            </li>
            <li><a href="https://www.cetis99.edu.mx/plantel/informacion" target="_blank"><i data-lucide="info" style="width:14px; height:14px; margin-right:4px;"></i> ¿Quiénes Somos?</a></li>
        </ul>
    </nav>

    <div id="cuerpo">
        <div class="success-card divFormulario3">
            <div class="success-icon">
                <i data-lucide="flask-round" style="width: 32px; height: 32px;"></i>
            </div>
            <h1 style="background: none; -webkit-text-fill-color: currentcolor; font-size: 24px; font-weight: 700; margin-bottom: 12px; color: var(--text-main);">
                ¡Reactivo Registrado!
            </h1>
            <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 24px; line-height: 1.5;">
                La sustancia química y sus fechas de control de caducidad se almacenaron correctamente en el clúster relacional.
            </p>
            <a href="../html/Agregar.html" class="btn-primary" style="width: 100%; background: linear-gradient(to right, #00d9f5, #0088cc); color:#0b0f19; box-shadow: 0 4px 12px rgba(0,217,245,0.2);">
                <i data-lucide="arrow-left" style="width:16px; height:16px;"></i> Volver al Almacén
            </a>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>