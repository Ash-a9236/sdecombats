/**
 * Activity Popup Handler
 * Manages the popup display for activity details
 */

// Open the activity popup
function openActivityPopup() {
    const popup = document.getElementById("activityPopup");
    if (popup) {
        popup.classList.add("active");
        document.body.style.overflow = "hidden"; // Prevent background scrolling
    }
}

// Close the activity popup
function closeActivityPopup() {
    const popup = document.getElementById("activityPopup");
    if (popup) {
        popup.classList.remove("active");
        document.body.style.overflow = ""; // Restore scrolling
    }
}

// Close popup when clicking on overlay
document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("activityPopup");
    const overlay = popup?.querySelector(".activity-popup__overlay");

    if (overlay) {
        overlay.addEventListener("click", closeActivityPopup);
    }

    // Close on ESC key
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            closeActivityPopup();
        }
    });

    // Add click handlers to all text-box components
    const textBoxes = document.querySelectorAll(".text-box");
    textBoxes.forEach((textBox) => {
        textBox.addEventListener("click", function () {
            openActivityPopup();
        });

        // Add cursor pointer style
        textBox.style.cursor = "pointer";
    });
});

// Prevent popup close when clicking inside the popup content
document.addEventListener("DOMContentLoaded", function () {
    const popupContainer = document.querySelector(".activity-popup__container");
    if (popupContainer) {
        popupContainer.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    }
});
