
const panelService = document.getElementById("formService"); 

function mostrarForm(){
    panelService.style.transition="1s ease-in-out";
    panelService.style.visibility="visible";
}

function ocultarForm(){
    panelService.style.visibility="hidden";
}