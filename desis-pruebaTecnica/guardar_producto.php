<?php
$conexion = new mysqli("localhost", "root", "", "desis");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$codigo = $_POST['fcode'];
$nombre = $_POST['fname'];
$precio = $_POST['fprecio'];
$moneda = $_POST['Moneda'];
$sucursal_id = $_POST['sucursal'];
$descripcion = $_POST['message'];

$materiales = [];
if (isset($_POST['plastico'])) $materiales[] = 1;
if (isset($_POST['metal'])) $materiales[] = 2; 
if (isset($_POST['madera'])) $materiales[] = 3; 
if (isset($_POST['textil'])) $materiales[] = 5;

$sql = "INSERT INTO productos (codigo, nombre, precio, moneda, sucursal_id, descripcion)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssdsis", $codigo, $nombre, $precio, $moneda, $sucursal_id, $descripcion);

if ($stmt->execute()) {
    $producto_id = $stmt->insert_id;
    foreach ($materiales as $material_id) {
        $sql = "INSERT INTO producto_materiales (producto_id, material_id) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ii", $producto_id, $material_id);
        $stmt->execute();
    }

    echo "Producto guardado correctamente.";
} else {
    echo "Error al guardar el producto: " . $stmt->error;
}

$conexion->close();
?>