function resizeMain() {
    const fc = document.querySelector("body>.container-sm");
    const footer = document.querySelector("footer");

    fc.style.setProperty("height", "calc(100vh - " + footer.clientHeight + "px)");
}

(() => {
    resizeMain();
    window.addEventListener("resize", resizeMain);
})()