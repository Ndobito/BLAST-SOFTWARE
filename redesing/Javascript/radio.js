function unselect() {
    document.querySelectorAll('[name=rb]').forEach((x) => x.checked = false);
}