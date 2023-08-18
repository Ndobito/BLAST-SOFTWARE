const container1 = document.getElementById("container-right");
const container2 = document.getElementById("container-right2");
const container3 = document.getElementById("container-right3");


function container(n) {

    if ( n == 1 ) {
        container2.style.display = "none"; 
        container3.style.display = "none"; 
        container1.style.display = "block";
    } else if ( n == 2 ) {
        container1.style.display = "none"; 
        container3.style.display = "none"; 
        container2.style.display = "block";
    } else if ( n == 3 ) {
        container1.style.display = "none"; 
        container2.style.display = "none"; 
        container3.style.display = "block";
    }
    
}