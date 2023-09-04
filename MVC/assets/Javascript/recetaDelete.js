document.addEventListener("DOMContentLoaded", function() {
    var resultadosReceta = document.getElementById("resultados-receta");
    
    resultadosReceta.addEventListener("click", function(event) {
        if (event.target.classList.contains("delete-icon")) {
            var rowToDelete = event.target.closest("tr");
            resultadosReceta.removeChild(rowToDelete);
        }
    });
});
