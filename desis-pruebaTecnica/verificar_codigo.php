<?php
$conexion = new mysqli("localhost", "root", "", "desis");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$codigo = $_GET['codigo'];

$sql = "SELECT id FROM productos WHERE codigo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $codigo);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(["existe" => true]);
} else {
    echo json_encode(["existe" => false]);
}

$conexion->close();
?>