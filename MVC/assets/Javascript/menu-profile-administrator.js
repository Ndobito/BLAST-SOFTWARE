
    // Espera a que el documento esté completamente cargado
    document.addEventListener("DOMContentLoaded", function() {
        
        var form = document.getElementById("search-form");

        
        form.addEventListener("submit", function(event) {
        
            event.preventDefault();

            // Obtiene el valor del campo de búsqueda
            var filtro = form.elements["buscar_proveedor"].value;

            // Realiza la redirección manualmente
            window.location.href = "?b=profile&s=Inicio&p=admin&buscar_proveedor=" + filtro + "#container-right2";
        });

        // Obtén los elementos del contenedor y los botones
        const container1 = document.getElementById("container-right");
        const container2 = document.getElementById("container-right2");
        const container3 = document.getElementById("container-right3");
        const container4 = document.getElementById("container-right4");
        const container5 = document.getElementById("container-right5");

        const profileAdmContainer = document.querySelectorAll(".profile-adm");
        const profileAdmBtn = document.querySelectorAll(".profile-adm-btn");

        profileAdmBtn.forEach((e, i) => {
            e.addEventListener("click", () => {
                profileAdmContainer.forEach(e => {
                    e.style.setProperty("display", "none");
                })
                profileAdmContainer[i].style.setProperty("display", "block");
            })
        });
    });

