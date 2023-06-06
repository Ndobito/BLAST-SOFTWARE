<<<<<<< HEAD
const container1 = document.getElementById("container-right");
const container2 = document.getElementById("container-right2");
const container3 = document.getElementById("container-right3");
const container4 = document.getElementById("container-right4");

=======
>>>>>>> f6c2d9841ae5381988d405d2e4f7d3da361436a4
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