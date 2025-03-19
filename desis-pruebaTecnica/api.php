<?php
$conexion = new mysqli("localhost", "root", "", "desis");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar bodegas
$sql_bodegas = "SELECT id, nombre FROM bodegas";
$resultado_bodegas = $conexion->query($sql_bodegas);
$bodegas = [];
while ($fila = $resultado_bodegas->fetch_assoc()) {
    $bodegas[] = $fila;
}

// Consultar sucursales
$sql_sucursales = "SELECT id, nombre FROM sucursales";
$resultado_sucursales = $conexion->query($sql_sucursales);
$sucursales = [];
while ($fila = $resultado_sucursales->fetch_assoc()) {
    $sucursales[] = $fila;
}

// Consultar valores de ENUM para moneda
$sql_moneda = "SHOW COLUMNS FROM productos WHERE Field = 'moneda'";
$resultado_moneda = $conexion->query($sql_moneda);
$fila_moneda = $resultado_moneda->fetch_assoc();
preg_match("/^enum\(\'(.*)\'\)$/", $fila_moneda['Type'], $matches);
$valores_moneda = explode("','", $matches[1]);

$conexion->close();

echo json_encode([
    'bodegas' => $bodegas,
    'sucursales' => $sucursales,
    'monedas' => $valores_moneda
]);
?>