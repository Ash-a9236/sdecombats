// Contact Page JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // Smooth scroll for quick nav buttons
    const quickNavButtons = document.querySelectorAll(".quick-nav-btn");
    quickNavButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href");
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                const yOffset = -100; // Offset for fixed header
                const y =
                    targetSection.getBoundingClientRect().top +
                    window.pageYOffset +
                    yOffset;

                window.scrollTo({ top: y, behavior: "smooth" });
            }
        });
    });

    // Parking package booking buttons
    const bookingButtons = document.querySelectorAll(".package-book-btn");
    bookingButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const bookingUrl = this.getAttribute("data-url");
            if (bookingUrl) {
                window.location.href = bookingUrl;
            }
        });
    });

    // Contact form validation and handling
    const contactForm = document.getElementById("contactForm");

    if (contactForm) {
        contactForm.addEventListener("submit", function (e) {
            e.preventDefault();

            // Get form values
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const confirmEmail = document
                .getElementById("confirm-email")
                .value.trim();
            const phone = document.getElementById("phone").value.trim();
            const activities = document.getElementById("activities").value;
            const inquiryType = document.getElementById("inquiry-type").value;

            // Validate required fields
            if (
                !name ||
                !email ||
                !confirmEmail ||
                !phone ||
                !activities ||
                !inquiryType
            ) {
                showNotification(
                    "Please fill in all required fields.",
                    "error"
                );
                return;
            }

            // Validate email match
            if (email !== confirmEmail) {
                showNotification("Email addresses do not match.", "error");
                return;
            }

            // Validate email format
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showNotification(
                    "Please enter a valid email address.",
                    "error"
                );
                return;
            }

            // If validation passes, show success message
            showNotification(
                "Thank you for your message! We'll get back to you within 24 hours.",
                "success"
            );

            // Reset form
            contactForm.reset();

            // In a real implementation, you would send the form data to your server here
            // Example:
            // submitFormData(formData);
        });
    }

    // Email confirmation field - real-time validation
    const emailField = document.getElementById("email");
    const confirmEmailField = document.getElementById("confirm-email");

    if (emailField && confirmEmailField) {
        confirmEmailField.addEventListener("blur", function () {
            if (emailField.value && confirmEmailField.value) {
                if (emailField.value !== confirmEmailField.value) {
                    confirmEmailField.style.borderColor = "#ff4444";
                } else {
                    confirmEmailField.style.borderColor = "#4CAF50";
                }
            }
        });

        confirmEmailField.addEventListener("input", function () {
            if (emailField.value === confirmEmailField.value) {
                confirmEmailField.style.borderColor = "#4CAF50";
            } else {
                confirmEmailField.style.borderColor = "";
            }
        });
    }

    // Notification function
    function showNotification(message, type) {
        // Remove existing notification if any
        const existingNotification =
            document.querySelector(".form-notification");
        if (existingNotification) {
            existingNotification.remove();
        }

        // Create notification element
        const notification = document.createElement("div");
        notification.className = `form-notification ${type}`;
        notification.textContent = message;

        // Style the notification
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            font-weight: 700;
            font-size: 1rem;
            z-index: 10000;
            animation: slideDown 0.3s ease;
            max-width: 90%;
            text-align: center;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        `;

        if (type === "success") {
            notification.style.background =
                "linear-gradient(135deg, #4CAF50 0%, #45a049 100%)";
            notification.style.color = "#fff";
        } else {
            notification.style.background =
                "linear-gradient(135deg, #ff4444 0%, #cc0000 100%)";
            notification.style.color = "#fff";
        }

        // Add to page
        document.body.appendChild(notification);

        // Remove after 5 seconds
        setTimeout(() => {
            notification.style.animation = "slideUp 0.3s ease";
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 5000);
    }

    // Add CSS animation for notifications
    const style = document.createElement("style");
    style.textContent = `
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
            to {
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }
        }
    `;
    document.head.appendChild(style);

    // Active nav highlighting on scroll
    const sections = document.querySelectorAll("section[id]");
    const navButtons = document.querySelectorAll(".quick-nav-btn");

    function highlightNav() {
        let current = "";

        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (window.pageYOffset >= sectionTop - 200) {
                current = section.getAttribute("id");
            }
        });

        navButtons.forEach((btn) => {
            btn.classList.remove("active");
            if (btn.getAttribute("href") === `#${current}`) {
                btn.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", highlightNav);

    // Add active class styling
    const navStyle = document.createElement("style");
    navStyle.textContent = `
        .quick-nav-btn.active {
            background: linear-gradient(135deg, #fbaa56 0%, #ffc300 100%) !important;
            color: #2f2f2f !important;
            border-color: #ffc300 !important;
        }

        .quick-nav-btn.active img {
            filter: brightness(0) saturate(100%) invert(18%) sepia(5%) saturate(10%) hue-rotate(340deg) brightness(96%) contrast(88%) !important;
        }
    `;
    document.head.appendChild(navStyle);
});
