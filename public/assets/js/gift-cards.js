/**
 * Gift Cards Page JavaScript
 * Handles carousel, FAQ accordion, and interactive elements
 */

(function () {
    "use strict";

    // ==========================================
    // Activities Carousel Management
    // ==========================================

    const carousel = document.querySelector(".gift-cards-activities-carousel");
    const indicators = document.querySelectorAll(
        ".gift-cards-carousel-indicators .indicator"
    );

    if (carousel && indicators.length > 0) {
        let currentSlide = 0;
        let autoScrollInterval;

        // Update active indicator
        function updateIndicators(index) {
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle("active", i === index);
            });
        }

        // Scroll to specific slide
        function scrollToSlide(index) {
            const cards = carousel.querySelectorAll(
                ".gift-cards-activity-card"
            );
            if (cards[index]) {
                const cardWidth = cards[index].offsetWidth;
                const gap = parseInt(getComputedStyle(carousel).gap) || 0;
                const scrollPosition = (cardWidth + gap) * index;

                carousel.scrollTo({
                    left: scrollPosition,
                    behavior: "smooth",
                });

                currentSlide = index;
                updateIndicators(index);
            }
        }

        // Auto-scroll functionality
        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                const totalSlides = indicators.length;
                currentSlide = (currentSlide + 1) % totalSlides;
                scrollToSlide(currentSlide);
            }, 3500); // Change slide every 3.5 seconds
        }

        function stopAutoScroll() {
            if (autoScrollInterval) {
                clearInterval(autoScrollInterval);
            }
        }

        // Indicator click handlers
        indicators.forEach((indicator, index) => {
            indicator.addEventListener("click", () => {
                stopAutoScroll();
                scrollToSlide(index);
                // Restart auto-scroll after user interaction
                setTimeout(startAutoScroll, 5000);
            });
        });

        // Detect scroll position for manual scrolling
        let scrollTimeout;
        carousel.addEventListener("scroll", () => {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                const cards = carousel.querySelectorAll(
                    ".gift-cards-activity-card"
                );
                const scrollLeft = carousel.scrollLeft;
                const cardWidth = cards[0].offsetWidth;
                const gap = parseInt(getComputedStyle(carousel).gap) || 0;

                // Calculate which card is most visible
                const newIndex = Math.round(scrollLeft / (cardWidth + gap));
                if (newIndex !== currentSlide && newIndex < indicators.length) {
                    currentSlide = newIndex;
                    updateIndicators(currentSlide);
                }
            }, 100);
        });

        // Touch events to pause auto-scroll
        carousel.addEventListener("touchstart", stopAutoScroll);
        carousel.addEventListener("touchend", () => {
            setTimeout(startAutoScroll, 5000);
        });

        // Start auto-scroll on load
        startAutoScroll();

        // Pause on visibility change
        document.addEventListener("visibilitychange", () => {
            if (document.hidden) {
                stopAutoScroll();
            } else {
                startAutoScroll();
            }
        });
    }

    // ==========================================
    // FAQ Accordion
    // ==========================================

    const faqItems = document.querySelectorAll(".gift-cards-faq-item");

    faqItems.forEach((item) => {
        const question = item.querySelector(".gift-cards-faq-question");

        if (question) {
            question.addEventListener("click", () => {
                const isActive = item.classList.contains("active");

                // Close all other items
                faqItems.forEach((otherItem) => {
                    if (otherItem !== item) {
                        otherItem.classList.remove("active");
                    }
                });

                // Toggle current item
                item.classList.toggle("active", !isActive);
            });
        }
    });

    // ==========================================
    // CTA Card Click Handlers
    // ==========================================

    const ctaCards = document.querySelectorAll(".gift-cards-cta-card");

    ctaCards.forEach((card) => {
        card.addEventListener("click", function () {
            const link = this.getAttribute("data-link");
            if (link) {
                // Smooth scroll to purchase section
                const targetSection = document.querySelector(link);
                if (targetSection) {
                    targetSection.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            }
        });

        // Add visual feedback
        card.addEventListener("touchstart", function () {
            this.style.transform = "scale(0.98)";
        });

        card.addEventListener("touchend", function () {
            this.style.transform = "";
        });
    });

    // ==========================================
    // Smooth Scroll for Internal Links
    // ==========================================

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");

            // Only handle internal links with valid targets
            if (href !== "#" && href !== "") {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            }
        });
    });

    // ==========================================
    // Intersection Observer for Animations
    // ==========================================

    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }
        });
    }, observerOptions);

    // Observe benefit cards for fade-in animation
    const benefitCards = document.querySelectorAll(".gift-cards-benefit-card");
    benefitCards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";
        card.style.transition = `opacity 0.6s ease ${
            index * 0.1
        }s, transform 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });

    // ==========================================
    // Add Loading State to Purchase Widget
    // ==========================================

    const purchaseWidget = document.querySelector(
        ".gift-cards-purchase-placeholder"
    );

    if (purchaseWidget) {
        // Simulate widget loading (replace with actual widget integration)
        setTimeout(() => {
            purchaseWidget.innerHTML = `
                <img src="./././assets/images/placeholders/icon_placeholder.png" alt="Purchase" class="gift-cards-purchase-icon">
                <p class="gift-cards-purchase-placeholder-text">Ready to purchase</p>
                <p class="gift-cards-purchase-placeholder-subtext">Integrate your booking system here</p>
            `;
        }, 1000);
    }

    // ==========================================
    // Responsive Carousel Adjustment
    // ==========================================

    let resizeTimeout;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Recalculate carousel position on resize
            if (carousel) {
                scrollToSlide(currentSlide);
            }
        }, 250);
    });
})();
