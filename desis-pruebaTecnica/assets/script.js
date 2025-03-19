addEventListener("DOMContentLoaded", function () {
   const selectBodega = document.getElementById("bodega");
   const selectSucursal = document.getElementById("sucursal");
   const selectMoneda = document.querySelector('select[name="Moneda"]');

   const xhr = new XMLHttpRequest();
   xhr.open("GET", "http://localhost/desis-pruebaTecnica/api.php", true);
   xhr.onload = function () {
      if (xhr.status === 200) {
         const data = JSON.parse(xhr.responseText);
         console.log(data);
         data.bodegas.forEach((bodega) => {
            const option = document.createElement("option");
            option.value = bodega.id;
            option.textContent = bodega.nombre;
            selectBodega.appendChild(option);
         });
         data.monedas.forEach((moneda) => {
            const option = document.createElement("option");
            option.value = moneda;
            option.textContent = moneda;
            selectMoneda.appendChild(option);
         });
      } else {
         console.error("Error:", xhr.statusText);
      }
   };
   xhr.onerror = function () {
      console.error("Error de red");
   };
   xhr.send();

   selectBodega.addEventListener("change", function () {
      const bodegaId = this.value;
      selectSucursal.innerHTML = '<option value=""></option>';
      if (!bodegaId) return;

      const xhrSucursales = new XMLHttpRequest();
      xhrSucursales.open(
         "GET",
         `http://localhost/desis-pruebaTecnica/sucursales.php?bodega_id=${bodegaId}`,
         true
      );
      xhrSucursales.onload = function () {
         if (xhrSucursales.status === 200) {
            const sucursales = JSON.parse(xhrSucursales.responseText);
            console.log("Sucursales:", sucursales);
            sucursales.forEach((sucursal) => {
               const option = document.createElement("option");
               option.value = sucursal.id;
               option.textContent = sucursal.nombre;
               selectSucursal.appendChild(option);
            });
         } else {
            console.error("Error:", xhrSucursales.statusText);
         }
      };
      xhrSucursales.onerror = function () {
         console.error("Error de red");
      };
      xhrSucursales.send();
   });
   document.getElementById("form").addEventListener("submit", function (e) {
      e.preventDefault();
      const codigo = document.getElementById("code").value;
      const nombre = document.getElementById("name").value;
      const precio = document.getElementById("precio").value;
      const descripcion = document.getElementById("descr").value;
      const bodega = document.getElementById("bodega").value;
      const sucursal = document.getElementById("sucursal").value;

      const esCodigoValido = validarCodigo(codigo);
      const esNombreValido = validarNombre(nombre);
      const esPrecioValido = validarPrecio(precio);
      const esDescripcionValida = validarDescripcion(descripcion);
      const esBodegaValida = validarBodega(bodega);
      const esSucursalValida = validarSucursal(sucursal);
      const esCheckboxesValido = validarCheckboxes();

      if (
         esCodigoValido &&
         esNombreValido &&
         esPrecioValido &&
         esDescripcionValida &&
         esBodegaValida &&
         esSucursalValida &&
         esCheckboxesValido
      ) {
         const xhr = new XMLHttpRequest();
         xhr.open("GET", `http://localhost/desis-pruebaTecnica/verificar_codigo.php?codigo=${codigo}`, true);
         xhr.onload = function () {
            if (xhr.status === 200) {
               const respuesta = JSON.parse(xhr.responseText);
               if (respuesta.existe) {
                  alert("El código del producto ya está registrado.");
               } else {
                  document.getElementById("form").submit();
               }
            } else {
               console.error("Error:", xhr.statusText);
            }
         };
         xhr.onerror = function () {
            console.error("Error de red");
         };
         xhr.send();
      } else {
         return
      }
   });
});

function validarCodigo(codigo) {
   if (codigo.length === 0) {
      alert("El código del producto no puede estar en blanco.");
      return false;
   }

   if (codigo.length < 5 || codigo.length > 15) {
      alert("El código del producto debe tener entre 5 y 15 caracteres.");
   }

   const regex = /^[a-zA-Z0-9]*$/;
   if (!regex.test(codigo)) {
      alert("El código del producto debe contener letras y números.");
      return false;
   }
   return true;
}

function validarNombre(nombre) {
   if (nombre.length === 0) {
      alert("El nombre del producto no puede estar en blanco.");
      return false;
   }

   if (nombre.length < 2 || nombre.length > 50) {
      alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
      return false;
   }
   return true;
}

function validarPrecio(precio) {
   const precioFloat = parseFloat(precio);
   if (precio.length === 0) {
      alert("El precio del producto no puede estar en blanco");
      return false;
   }

   if (precio <= 0) {
      alert(
         "El precio del producto debe ser un número positivo con hasta dos decimales"
      );
      return false;
   }

   const precioFixed = precioFloat.toFixed(2);
   if (precio !== precioFixed) {
      alert("El precio debe tener como máximo dos decimales.");
      return false;
   }
   return true;
}

function contarCheckboxesMarcados() {
   let cantidadMarcados = 0;
   const checkboxes = document.querySelectorAll("input[type='checkbox']");
   checkboxes.forEach(function (checkbox) {
      if (checkbox.checked) {
         cantidadMarcados++;
      }
   });
   return cantidadMarcados;
}

function validarCheckboxes() {
   return contarCheckboxesMarcados() >= 2;
}

function validarDescripcion(descr) {
   if (descr.length === 0) {
      alert("La descripción del producto no puede estar en blanco.");
      return false;
   }
   if (descr.length < 10 || descr.length > 1000) {
      alert(
         "La descripción del producto debe tener entre 10 y 1000 caracteres."
      );
      return false;
   }
   return true;
}

function validarBodega(bodega) {
   if (bodega.length === 0) {
      alert("Debe seleccionar una bodega.");
      return false;
   }
   return true;
}

function validarSucursal(sucursal) {
   if (sucursal.length === 0) {
      alert("Debe seleccionar una sucursal para la bodega seleccionada.");
      return false;
   }
   return true;
}

function verificarMoneda(moneda) {
   if (moneda.length === 0) {
      alert("Debe seleccionar una moneda para el producto.");
   }
}