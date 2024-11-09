function loadHTML(elementId, filePath) {
    fetch(filePath)
        .then(response => response.text())
        .then(data => {
            document.getElementById(elementId).innerHTML = data;
        });
}

window.addEventListener('DOMContentLoaded', () => {
    loadHTML('header', './templates/header.html');
    loadHTML('footer', './templates/footer.html');
});