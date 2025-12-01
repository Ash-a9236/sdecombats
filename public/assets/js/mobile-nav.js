document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript loaded!");

    const menuToggle = document.getElementById("menuToggle");
    const menuClose = document.getElementById("menuClose");
    const mobileNav = document.getElementById("mobileNav");

    console.log("menuToggle:", menuToggle);
    console.log("menuClose:", menuClose);
    console.log("mobileNav:", mobileNav);

    if (menuToggle) {
        menuToggle.addEventListener("click", function (e) {
            e.preventDefault();
            mobileNav.classList.add("open");
            console.log("Menu opened");
        });
    } else {
        console.error("menuToggle button not found!");
    }

    if (menuClose) {
        menuClose.addEventListener("click", function (e) {
            e.preventDefault();
            mobileNav.classList.remove("open");
            console.log("Menu closed");
        });
    } else {
        console.error("menuClose button not found!");
    }

    const indicators = document.querySelectorAll(".carousel-indicator");
    console.log("Found indicators:", indicators.length);

    indicators.forEach((indicator, index) => {
        console.log("Setting up indicator", index);

        indicator.addEventListener("click", function () {
            console.log("Indicator clicked:", this.dataset.slide);
            indicators.forEach((ind) => ind.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
