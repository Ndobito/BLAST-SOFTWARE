function desselectRadio(number) {
    var rb = document.getElementsByName("recetar" + number)[0];
    let icon = document.getElementById("x-mark" + number).addEventListener("click", () => {
        rb.checked = false;
    });
}
