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