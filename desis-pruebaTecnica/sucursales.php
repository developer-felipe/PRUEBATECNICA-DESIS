<?php
$conexion = new mysqli("localhost", "root", "", "desis");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$bodega_id = $_GET['bodega_id'];

$sql = "SELECT s.id, s.nombre 
        FROM sucursales s
        JOIN bodega_sucursal bs ON s.id = bs.sucursal_id
        WHERE bs.bodega_id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $bodega_id);
$stmt->execute();
$resultado = $stmt->get_result();

$sucursales = [];
while ($fila = $resultado->fetch_assoc()) {
    $sucursales[] = $fila;
}

$conexion->close();

header('Content-Type: application/json');
echo json_encode($sucursales);
?>