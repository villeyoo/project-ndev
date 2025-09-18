document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById("hamburger");
    const navMenu = document.getElementById("nav-menu");

    hamburger.addEventListener("click", function () {
        hamburger.classList.toggle("open");
        navMenu.classList.toggle("active");
    });
});
