<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "lab.quimica";

$conexion = new mysqli($server, $user, $pass, $db);

if($conexion->connect_errno) {
	echo "La conexion ha fallado. ".$conexion->connect_errno;
}

?>