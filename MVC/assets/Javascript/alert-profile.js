function alertProfile(id, rol, name){

    switch(rol){
        case 'proveedor':
            var respuesta = confirm("¿Esta seguro(a) de eliminar al proveedor "+name+"?");
            if(respuesta === true){
                window.location.href = "?b=profile&s=deleteProfile&p=proveedor&id="+id+"name="+name; 
            } 
            break;
        case 'colaborador':
            var respuesta = confirm("¿Esta seguro(a) de eliminar este colaborador?");
            if(respuesta === true){
                window.location.href = "?b=profile&s=deleteProfile&p=colaborador&id="+id; 
            } 
            break;
        case 'cliente':
            var respuesta = confirm("¿Esta seguro(a) de eliminar este cliente?");
            if(respuesta === true){
                window.location.href = "?b=profile&s=deleteProfile&p=cliente&id="+id; 
            } 
            break;
        case 'mascota':
            var respuesta = confirm("¿Esta seguro(a) de eliminar esta mascota?");
            if(respuesta === true){
                window.location.href = "?b=profile&s=deleteProfile&p=mascota&id="+id; 
            } 
            break;
        default:
            break;
    }
}

function destroySession(){
    var respuesta = confirm("¿Esta seguro(a) de finalizar la sesión?");
    if(respuesta === true){
        window.location.href = "?b=profile&s=cerrarSesion"; 
    } 
}