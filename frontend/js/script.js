const aboutP = document.querySelector(".about_p")
const serviceP = document.querySelector(".service_p")
const floatingFirst = document.querySelector(".floating_div_first")
const floatingSecond = document.querySelector(".floating_div_second")

// For About section
aboutP.addEventListener("mouseover", function () {
    floatingFirst.classList.add("floating_animation")
})

aboutP.addEventListener("mouseout", function (e) {
    // Only hide if not moving to the floating div
    setTimeout(() => {
        if (!floatingFirst.matches(':hover') && !aboutP.matches(':hover')) {
            floatingFirst.classList.remove("floating_animation")
        }
    }, 100)
})

floatingFirst.addEventListener("mouseover", function () {
    floatingFirst.classList.add("floating_animation")
})

floatingFirst.addEventListener("mouseout", function () {
    setTimeout(() => {
        if (!floatingFirst.matches(':hover') && !aboutP.matches(':hover')) {
            floatingFirst.classList.remove("floating_animation")
        }
    }, 100)
})

// For Service section
serviceP.addEventListener("mouseover", function () {
    floatingSecond.classList.add("floating_animation")
})

serviceP.addEventListener("mouseout", function () {
    setTimeout(() => {
        if (!floatingSecond.matches(':hover') && !serviceP.matches(':hover')) {
            floatingSecond.classList.remove("floating_animation")
        }
    }, 100)
})

floatingSecond.addEventListener("mouseover", function () {
    floatingSecond.classList.add("floating_animation")
})

floatingSecond.addEventListener("mouseout", function () {
    setTimeout(() => {
        if (!floatingSecond.matches(':hover') && !serviceP.matches(':hover')) {
            floatingSecond.classList.remove("floating_animation")
        }
    }, 100)
})

let sideBar = document.querySelector(".sideBar")
let sideBarToggle = document.querySelector("sideBar_toggle")
const navBtn = document.querySelector(".nav_btn")
const navClose = document.querySelector(".nav_close")

navBtn.addEventListener('click', function () {
    sideBar.classList.toggle("sideBar_toggle")
})
navClose.addEventListener('click', function () {
    sideBar.classList.toggle("sideBar_toggle")
})