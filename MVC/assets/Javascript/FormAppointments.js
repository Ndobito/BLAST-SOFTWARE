
const panelService = document.getElementById("formService"); 

function mostrarForm(){
    panelService.style.transition="1s ease-in-out";
    panelService.style.visibility="visible";
}

function ocultarForm(){
    panelService.style.visibility="hidden";
}

window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('p') === 'showForm') {
        setTimeout(mostrarForm, 3000);
    }
}