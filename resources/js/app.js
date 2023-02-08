import "./bootstrap";

// navbar fixed
window.onscroll = function () {
    const header = document.querySelector("header");
    const fixedNav = header.offsetTop;

    if (window.pageYOffset > fixedNav) {
        header.classList.add("navbar-fixed");
    } else {
        header.classList.remove("navbar-fixed");
    }
};

// Hamburger

const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("hamburger-active");
    navMenu.classList.toggle("hidden");
});

// Preview Image

// Sidebar;
// const menu = document.getElementById("menu-label");
// const sidebar = document.getElementsByClassName("sidebar")[0];

// menu.addEventListener("click", function () {
//     sidebar.classList.toggle("hide");
// });

// // Responsive sidebar
// let arrow = document.querySelectorAll(".arrow");
// for (var i = 0; i < arrow.length; i++) {
//     arrow[i].addEventListener("click", (e) => {
//         let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
//         arrowParent.classList.toggle("showMenu");
//     });
// }
// let sidebar = document.querySelector(".sidebar");
// let sidebarBtn = document.querySelector(".bx-menu");
// console.log(sidebarBtn);
// sidebarBtn.addEventListener("click", () => {
//     sidebar.classList.toggle("close");
// });
