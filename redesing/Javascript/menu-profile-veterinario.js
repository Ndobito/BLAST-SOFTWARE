const container1 = document.getElementById("container-right");
const container2 = document.getElementById("container-right2");
const container3 = document.getElementById("container-right3");
const container4 = document.getElementById("container-right4");

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