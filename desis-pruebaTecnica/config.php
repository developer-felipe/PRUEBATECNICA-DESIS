<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "desis";

$conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

echo "Conexión exitosa a la base de datos.";

if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"]. " - Nombre: " . $fila["nombre"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conexion->close();
?>