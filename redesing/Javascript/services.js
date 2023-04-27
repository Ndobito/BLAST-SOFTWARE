let panel1 = document.getElementById("reserve-citas");
let panel2 = document.getElementById("reserve-surgeries");
let panel3 = document.getElementById("reserve-lab");
let panel4 = document.getElementById("reserve-xrays");

function exit(a) {
    switch (a) {
        case 1:
            panel1.style.display = "none";
            break;
        case 2:
            panel2.style.display = "none";
            break;
        case 3:
            panel3.style.display = "none";
            break;
        case 4:
            panel4.style.display = "none";
            break;
        default:
            console.log("Invalido")
            break;
    }
    
}


function reserver(opc){

    switch (opc) {
        case 1:
            panel1.classList.add("reserve-active");
            panel1.style.display = "block";
            break;
        case 2:
            panel2.style.display = "block";
            break;
        case 3:
            panel3.style.display = "block";
            break;
        case 4:
            panel4.style.display = "block";
            break;
    
        default:
            break;
    }
}

//Calendar 