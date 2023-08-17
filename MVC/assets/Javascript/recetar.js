// Calcular el total de la lista de los productos
function calcularTotal() {
    var total = 0;
    for (id in totalProductos) {
        total += totalProductos[id].cantidad * totalProductos[id].precio;
    }
    document.getElementById("total-pagar").textContent = total.toFixed(2);
}

// Agregar productos a la lista
var totalProductos = {};

document.addEventListener("DOMContentLoaded", function () {

    // Fecha actual
    var fecha = new Date(); 
    var formate = fecha.toISOString().split('T')[0]; 
    document.getElementById("date-receta").value = formate; 

    var addRecetaButton = document.getElementById("addReceta");

    addRecetaButton.addEventListener("click", function (event) {
        event.preventDefault(); // Evita el comportamiento por defecto del botón

        var productosSeleccionados = document.querySelectorAll(
            'input[type="checkbox"]:checked'
        );
        var resultadosReceta = document.getElementById("resultados-receta");
        productosSeleccionados.forEach(function (producto) {
            var productoRow = producto.closest("tr");
            var idproducto = productoRow.querySelector("td:nth-child(1)").textContent;
            var nombreProducto = productoRow.querySelector("td:nth-child(2)")
                .textContent;
            var precioProducto = parseInt(
                productoRow.querySelector("td:nth-child(4)").textContent
            );

            totalProductos[idproducto] = {
                cantidad: 1,
                precio: precioProducto,
            };

            var newRow = resultadosReceta.insertRow();
            newRow.setAttribute("data-id", idproducto);
            newRow.innerHTML = `
                <td>${nombreProducto}</td>
                <td>${precioProducto}</td>
                <td><i id='res-cant' class="fa-solid fa-minus"></i><input disabled type="number" name="cantidad" value="1"><i id='plus-cant' class="fa-solid fa-plus"></i></td>
                <td><i class="fa-solid fa-xmark delete-icon"></i></td>
            `;
        });
        calcularTotal();
    });
});

// Eliminar productos de la lista
document.addEventListener("DOMContentLoaded", function () {
    var resultadosReceta = document.getElementById("resultados-receta");

    resultadosReceta.addEventListener("click", function (event) {
        if (event.target.classList.contains("delete-icon")) {
            var rowToDelete = event.target.closest("tr");
            var dataid = rowToDelete.getAttribute("data-id");
            resultadosReceta.removeChild(rowToDelete);
            delete totalProductos[dataid];
            calcularTotal();
        }

        if (event.target.id === "res-cant") {
            var rowToUpdate = event.target.closest("tr");
            var dataid = rowToUpdate.getAttribute("data-id");
            var inputCantidad = rowToUpdate.querySelector('input[name="cantidad"]');
            var cantidad = parseInt(inputCantidad.value);
            if (cantidad > 1) {
                cantidad--;
                inputCantidad.value = cantidad;
                totalProductos[dataid].cantidad = cantidad;
                actualizarPrecio(dataid, cantidad);
                calcularTotal();
            }
        }

        if (event.target.id === "plus-cant") {
            var rowToUpdate = event.target.closest("tr");
            var dataid = rowToUpdate.getAttribute("data-id");
            var inputCantidad = rowToUpdate.querySelector('input[name="cantidad"]');
            var cantidad = parseInt(inputCantidad.value);
            cantidad++;
            inputCantidad.value = cantidad;
            totalProductos[dataid].cantidad = cantidad;
            actualizarPrecio(dataid, cantidad);
            calcularTotal();
        }
    });
});

function actualizarPrecio(dataid, cantidad) {
    var precioProducto = totalProductos[dataid].precio;
    var precioTotal = precioProducto * cantidad;
    var rowToUpdate = document.querySelector(`tr[data-id="${dataid}"]`);
    var precioCell = rowToUpdate.querySelector("td:nth-child(2)");
    precioCell.textContent = precioTotal.toFixed(2);
}
