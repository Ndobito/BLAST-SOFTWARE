const bar = document.getElementById("ctSearch"); 
const icon = document.getElementById("icon-search");

icon.addEventListener("click", () => {
    bar.style.visibility = "visible"; 
    bar.style.maxWidth = "100%";  
    icon.style.marginLeft = "40%"; 
}); 