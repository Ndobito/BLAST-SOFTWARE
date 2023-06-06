const userContainer = document.getElementById("parent-container-form-user");
const petContainer = document.getElementById("parent-container-form-pet");
const confirmationUserContainer = document.getElementById("parent-container-form-confirmation-user");

const addButtonEvent = (button, targetContainer, sourceContainer) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();
    targetContainer.style.display = "block";
    sourceContainer.style.display = "none";
  });
};

const nextConfButton = document.querySelector(".nextconf");
addButtonEvent(nextConfButton, confirmationUserContainer, userContainer);

const returnButton1 = document.querySelector(".return1");
addButtonEvent(returnButton1, userContainer, confirmationUserContainer);

const nextButton = document.querySelector(".next");
addButtonEvent(nextButton, petContainer, confirmationUserContainer);

const returnButton2 = document.querySelector(".return2");
<<<<<<< HEAD
addButtonEvent(returnButton2, confirmationUserContainer, petContainer);
=======
addButtonEvent(returnButton2, confirmationUserContainer, petContainer);
>>>>>>> f6c2d9841ae5381988d405d2e4f7d3da361436a4
