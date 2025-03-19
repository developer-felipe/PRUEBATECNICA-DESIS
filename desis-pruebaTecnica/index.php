<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>DESIS</title>
</head>

<body>
    <div class="container">
        <div class="flexbox">
            <h1>Formulario de Producto</h1>
            <form id="form" action="guardar_producto.php" method="POST">
                <section class="layout">
                    <div>
                        <label for="code">Código</label><br>
                        <input type="text" id="code" name="fcode"><br>
                        <label for="bodega">Bodega</label><br>
                        <select id="bodega" name="Bodega">
                            <option value=""></option>
                        </select><br>
                        <label for="moneda">Moneda</label><br>
                        <select id="moneda" name="Moneda">
                            <option value=""></option>
                        </select><br>
                    </div>
                    <div>
                        <label for="name">Nombre</label><br>
                        <input type="text" id="name" name="fname"><br>
                        <label for="sucursal">Sucursal</label><br>
                        <select id="sucursal" name="sucursal">
                            <option value=""></option>
                        </select><br>
                        <label for="precio">Precio</label><br>
                        <input type="text" id="precio" name="fprecio"><br>
                    </div>
                    <div>
                        <label>Material del producto</label><br>
                        <input type="checkbox" id="plastico" name="plastico" value="plastico">Plástico
                        <input type="checkbox" id="metal" name="metal" value="metal">Metal
                        <input type="checkbox" id="madera" name="madera" value="madera">Madera
                        <input type="checkbox" id="vidrio" name="vidrio" value="vidrio">Vidrio
                        <input type="checkbox" id="textil" name="textil" value="textil">Textil
                        <br>
                        <br>
                        <label for="descr">Descripción</label><br>
                        <textarea id="descr" name="message" rows="6" cols="40"></textarea><br>
                        <div class="button-container">
                            <button type="submit">Guardar Producto</button>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <script src="assets/script.js"></script>
</body>

</html>