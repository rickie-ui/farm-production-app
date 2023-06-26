$(document).ready(function () {
    $("#overview").DataTable();
    $("#produce").DataTable();
});

function showMenu() {
    let element = document.getElementById("menu");
    element.style.display = "block";
}

function hideMenu() {
    let element = document.getElementById("menu");
    element.style.display = "none";
}
