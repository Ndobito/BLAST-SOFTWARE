document.addEventListener("DOMContentLoaded", function() {
    var addRecetaButton = document.getElementById("addReceta");
    
    addRecetaButton.addEventListener("click", function(event) {
        event.preventDefault(); // Evita el comportamiento por defecto del botón

        var productosSeleccionados = document.querySelectorAll('input[type="checkbox"]:checked');
        var resultadosReceta = document.getElementById("resultados-receta");
        var totalProductos = 0; 
        productosSeleccionados.forEach(function(producto) {
            var productoRow = producto.closest("tr");
            var nombreProducto = productoRow.querySelector("td:nth-child(2)").textContent;
            var precioProducto = productoRow.querySelector("td:nth-child(4)").textContent;  
            totalProductos += parseInt(precioProducto); 
            var newRow = resultadosReceta.insertRow();
            newRow.innerHTML = `
                <td>${nombreProducto}</td>
                <td>${precioProducto}</td>
                <td><input type="number" name="cantidad" value="1"></td>
                <td><i class="fa-solid fa-xmark delete-icon"></i></td>
            `;
        });
        document.getElementById("total-pagar").innerHTML = totalProductos;
    });
});
