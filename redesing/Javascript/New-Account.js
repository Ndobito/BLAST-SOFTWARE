const userContainer = document.getElementById("parent-container-form-user");
const petContainer = document.getElementById("parent-container-form-pet");
const confContainer = document.getElementById("parent-container-form-confirmation-user");
const botonPet = document.querySelector(".nextpet");
const botonReturn = document.querySelector(".return1");

botonPet.addEventListener("click", () => {
    petContainer.style.display = "block";
    userContainer.style.display = "none";
});

botonReturn.addEventListener("click", (event) => {
    event.preventDefault();
    petContainer.style.display = "none";
    userContainer.style.display = "block";
});