Este archivo contiene las instrucciones necesarias para importar la base de datos usando XAMPP y phpMyAdmin, así como para configurar el proyecto descargado desde GitHub.

---

- **XAMPP**:Debes tener XAMPP instalado en tu sistema.

---

### 1. Importar la Base de Datos

#### Paso 1: Iniciar XAMPP
1. Abre el panel de control de XAMPP.
2. Inicia los servicios de Apache y MySQL.

#### Paso 2: Acceder a phpMyAdmin
1. Abre tu navegador web y ve a la siguiente dirección: http://localhost/phpmyadmin

#### Paso 3: Crear una Base de Datos
1. En phpMyAdmin, haz clic en Nueva en la barra lateral izquierda.
2. Ingresa un nombre para la base de datos (por ejemplo, `desis`).
3. Haz clic en Crear.

#### Paso 4: Importar el Archivo SQL
1. Selecciona la base de datos recién creada en la barra lateral izquierda.
2. Haz clic en la pestaña Importar.
3. En la sección **Archivo a importar**, haz clic en Seleccionar archivo.
4. Busca y selecciona el archivo SQL adjunto
5. Haz clic en Continuar en la parte inferior de la página.

#### Paso 5: Verificar la Importación
1. Una vez completada la importación, verifica que las tablas y datos se hayan creado correctamente.

---

### 3. Configurar el Proyecto

#### Paso 1: Descargar el .zip del proyecto de Github
1. Descomprimir el archivo y copiar el contenido en: C:\xampp\htdocs (default)
2. Con los servicios activos de Apache y MySQL en XAMPP ve a la siguiente dirección: localhost/desis-pruebaTecnica/
3. Utilizar la aplicación

Se utilizó: 
-PHP 8.4.5
-MySQL
