<<<<<<< HEAD
const container1 = document.getElementById("container-right");
const container2 = document.getElementById("container-right2");
const container3 = document.getElementById("container-right3");
const container4 = document.getElementById("container-right4");


function container(n) {

    if ( n == 1 ) {
        container2.style.display = "none"; 
        container4.style.display = "none"; 
        container3.style.display = "none"; 
        container1.style.display = "block";
    } else if ( n == 2 ) {
        container1.style.display = "none"; 
        container4.style.display = "none"; 
        container3.style.display = "none"; 
        container2.style.display = "block";
    } else if ( n == 3 ) {
        container1.style.display = "none"; 
        container2.style.display = "none";
        container4.style.display = "none"; 
        container3.style.display = "block";
    }else if ( n == 4 ) {
        container1.style.display = "none"; 
        container2.style.display = "none"; 
        container3.style.display = "none";
        container4.style.display = "block";
    }
        
}
=======
const profileVetContainer = document.querySelectorAll(".profile-vet");
const profileVetBtn = document.querySelectorAll(".profile-vet-btn");
                  
profileVetBtn.forEach((e, i) => {
    e.addEventListener("click", () => {
        profileVetContainer.forEach(e => {
            e.style.setProperty("display", "none");
        })
        profileVetContainer[i].style.setProperty("display", "block");
    })
})
>>>>>>> f6c2d9841ae5381988d405d2e4f7d3da361436a4
