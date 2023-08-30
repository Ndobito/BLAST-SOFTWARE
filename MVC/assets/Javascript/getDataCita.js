function getCita(row){
    const idCita = row.getAttribute("data-id");
    const dniUsuario = row.getAttribute("data-dni");
    const inputid = document.getElementById('cita-id'); 
    const inputdni = document.getElementById('cita-dni'); 

    inputid.value = idCita; 
    inputdni.value = dniUsuario; 
}

function cleanForm() {
    
    var idcitInput = document.getElementById('cita-id');
    var dniuserInput = document.getElementById('cita-dni');
    var dateasigInput = document.getElementsByName('dateasig')[0];
    var selcolSelect = document.getElementsByName('selcol')[0];
    idcitInput.value = '';
    dniuserInput.value = '';
    dateasigInput.value = '';
    selcolSelect.selectedIndex = 0; 
    idcitInput.focus();
}