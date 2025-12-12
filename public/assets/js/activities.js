// Activities Page JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // Get elements
    const searchInput = document.getElementById("activitySearch");
    const searchBtn = document.getElementById("searchBtn");
    const filterButtons = document.querySelectorAll(".filter-btn");
    const activityCards = document.querySelectorAll(".activity-card");
    const noResults = document.getElementById("noResults");
    const clearSearchBtn = document.getElementById("clearSearch");

    let currentFilter = "all";

    // Search functionality
    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        activityCards.forEach((card) => {
            const title = card
                .querySelector(".activity-title")
                .textContent.toLowerCase();
            const description = card
                .querySelector(".activity-description")
                .textContent.toLowerCase();
            const category = card.getAttribute("data-category").toLowerCase();

            // Check if card matches search term
            const matchesSearch =
                title.includes(searchTerm) ||
                description.includes(searchTerm) ||
                category.includes(searchTerm);

            // Check if card matches current filter
            const matchesFilter =
                currentFilter === "all" || category.includes(currentFilter);

            // Show card only if it matches both search and filter
            if (matchesSearch && matchesFilter) {
                card.style.display = "block";
                visibleCount++;
            } else {
                card.style.display = "none";
            }
        });

        // Show/hide no results message
        if (visibleCount === 0) {
            noResults.style.display = "block";
        } else {
            noResults.style.display = "none";
        }
    }

    // Search on button click
    if (searchBtn) {
        searchBtn.addEventListener("click", performSearch);
    }

    // Search on Enter key
    if (searchInput) {
        searchInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                performSearch();
            }
        });

        // Real-time search as user types
        searchInput.addEventListener("input", performSearch);
    }

    // Filter buttons
    filterButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Remove active class from all buttons
            filterButtons.forEach((btn) => btn.classList.remove("active"));

            // Add active class to clicked button
            this.classList.add("active");

            // Update current filter
            currentFilter = this.getAttribute("data-filter");

            // Perform search with new filter
            performSearch();
        });
    });

    // Clear search button
    if (clearSearchBtn) {
        clearSearchBtn.addEventListener("click", function () {
            searchInput.value = "";
            currentFilter = "all";

            // Reset filter buttons
            filterButtons.forEach((btn) => {
                if (btn.getAttribute("data-filter") === "all") {
                    btn.classList.add("active");
                } else {
                    btn.classList.remove("active");
                }
            });

            // Show all cards
            activityCards.forEach((card) => {
                card.style.display = "block";
            });

            noResults.style.display = "none";
        });
    }

    // Book Now button functionality
    const bookButtons = document.querySelectorAll(".book-btn");
    bookButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const activityCard = this.closest(".activity-card");
            const activityTitle =
                activityCard.querySelector(".activity-title").textContent;

            // Here you would redirect to booking page or open booking modal
            console.log("Booking:", activityTitle);
            alert(
                `Booking ${activityTitle}... (This will redirect to booking page)`
            );
        });
    });

    // Smooth scroll animations on card hover
    activityCards.forEach((card) => {
        card.addEventListener("mouseenter", function () {
            this.style.transition = "all 0.3s ease";
        });
    });
});
