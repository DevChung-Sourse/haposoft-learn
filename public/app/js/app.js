const navBarIcon = document.querySelector(".nav-bar-icon")
const menu = document.querySelector("#menu")

navBarIcon.addEventListener("click", () => {
    menu.classList.toggle("active-menu")
})