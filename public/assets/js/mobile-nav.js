document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript loaded!");

    const menuToggle = document.getElementById("menuToggle");
    const menuClose = document.getElementById("menuClose");
    const mobileNav = document.getElementById("mobileNav");

    if (menuToggle) {
        menuToggle.addEventListener("click", function (e) {
            e.preventDefault();
            mobileNav.classList.add("open");
        });
    } else {
        console.error("menuToggle button not found!");
    }

    if (menuClose) {
        menuClose.addEventListener("click", function (e) {
            e.preventDefault();
            mobileNav.classList.remove("open");
        });
    } else {
        console.error("menuClose button not found!");
    }

    // Carousel indicators functionality
    const indicators = document.querySelectorAll(".carousel-indicator");

    if (indicators.length > 0) {
        console.log("Found " + indicators.length + " carousel indicators");

        indicators.forEach((indicator, index) => {
            indicator.addEventListener("click", function () {
                indicators.forEach((ind) => ind.classList.remove("active"));
                this.classList.add("active");
            });
        });
    }

    // ===== IMAGE GALLERY AUTO-SCROLL =====
    initializeImageGalleries();
});

/**
 * Initialize all image galleries with auto-scroll functionality
 */
function initializeImageGalleries() {
    const galleries = document.querySelectorAll(".image-gallery-scroll");

    if (galleries.length > 0) {
        console.log(
            "Initialized " + galleries.length + " auto-scroll galleries"
        );
    }

    galleries.forEach(function (gallery) {
        const images = gallery.querySelectorAll(".gallery-image-wrapper");

        if (images.length === 0) {
            return;
        }

        let currentIndex = 0;
        let intervalId = null;
        const autoScrollInterval = 3000; // 3 seconds

        // Function to scroll to specific image
        function scrollToImage(index) {
            const targetImage = images[index];
            if (targetImage) {
                gallery.scrollTo({
                    left: targetImage.offsetLeft,
                    behavior: "smooth",
                });
            }
        }

        // Function to start auto-scroll
        function startAutoScroll() {
            // Clear any existing interval
            if (intervalId) {
                clearInterval(intervalId);
            }

            intervalId = setInterval(function () {
                currentIndex = (currentIndex + 1) % images.length;
                scrollToImage(currentIndex);
            }, autoScrollInterval);
        }

        // Function to stop auto-scroll
        function stopAutoScroll() {
            if (intervalId) {
                clearInterval(intervalId);
                intervalId = null;
            }
        }

        // Start auto-scrolling
        startAutoScroll();

        // Pause on hover
        gallery.addEventListener("mouseenter", function () {
            stopAutoScroll();
        });

        gallery.addEventListener("mouseleave", function () {
            startAutoScroll();
        });

        // Add touch/swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        gallery.addEventListener(
            "touchstart",
            function (e) {
                touchStartX = e.changedTouches[0].screenX;
                stopAutoScroll();
            },
            { passive: true }
        );

        gallery.addEventListener(
            "touchend",
            function (e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoScroll();
            },
            { passive: true }
        );

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - next image
                    currentIndex = (currentIndex + 1) % images.length;
                } else {
                    // Swipe right - previous image
                    currentIndex =
                        (currentIndex - 1 + images.length) % images.length;
                }
                scrollToImage(currentIndex);
            }
        }
    });
}
