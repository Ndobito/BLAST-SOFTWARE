function enable(){
    var inputs =document.getElementsByTagName("input");
    var selects =document.getElementsByTagName("select");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
    for (var i = 0; i < selects.length; i++) {
        selects[i].disabled = false;
    }
}


function disable() {
    var inputs =document.getElementsByTagName("input");
    var selects =document.getElementsByTagName("select");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = true;
    }
    for (var i = 0; i < selects.length; i++) {
        selects[i].disabled = true;
    }
}