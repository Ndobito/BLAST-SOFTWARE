const bar = document.getElementById("ctSearch"); 
const icon = document.getElementById("icon-search");

icon.addEventListener("click", () => {
    bar.style.display = "block"; 
    bar.style.width = "100%";  
    icon.style.marginLeft = "40%"; 
}); 