function alertProfile(id, rol){

    switch(rol){
        case 'proveedor':
            var respuesta = confirm("¿Esta seguro(a) de eliminar este proveedor?");
            if(respuesta === true){
                window.location.href = "?b=profile&s=deleteProfile&p=proveedor&id="+id; 
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
    }
}