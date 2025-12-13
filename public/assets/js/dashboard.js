// Dashboard JavaScript - Handles interactive elements only
document.addEventListener("DOMContentLoaded", function () {
    // Initialize page-specific scripts based on what's on the page
    initializePageScripts();
});

// Initialize page-specific scripts
function initializePageScripts() {
    // Check which page is loaded and initialize accordingly
    if (document.querySelector(".reservation-form-compact")) {
        initMakeReservation();
    }
    if (document.querySelector(".update-page")) {
        initUpdateReservation();
    }
    if (document.querySelector(".view-page")) {
        initViewReservation();
    }
    if (document.querySelector(".delete-page")) {
        initDeleteReservation();
    }
    if (document.querySelector(".update-info-page")) {
        initUpdateInfo();
    }
}

// ===== MAKE RESERVATION PAGE SCRIPTS =====
function initMakeReservation() {
    // Calendar functionality
    const calendarDays = document.querySelectorAll(".cal-day:not(.dis)");
    calendarDays.forEach((day) => {
        day.addEventListener("click", function () {
            calendarDays.forEach((d) => d.classList.remove("sel"));
            this.classList.add("sel");
        });
    });

    // Time slot selection
    const timeSlots = document.querySelectorAll(".time-compact");
    timeSlots.forEach((slot) => {
        slot.addEventListener("click", function () {
            timeSlots.forEach((s) => {
                s.style.background = "#3f3f3fff";
                s.style.borderColor = "#3f3f3fff";
                s.style.color = "#fff4e2";
            });
            this.style.background = "#fbaa56";
            this.style.borderColor = "#ffc300";
            this.style.color = "#2f2f2f";
        });
    });

    // Toggle buttons for participants
    const toggleBtns = document.querySelectorAll(".toggle-compact");
    toggleBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const current = this.textContent.trim();
            if (current.startsWith("✓")) {
                this.textContent = "✕" + current.substring(1);
                this.style.background = "transparent";
                this.style.color = "#fff4e2";
            } else {
                this.textContent = "✓" + current.substring(1);
                this.style.background = "#fbaa56";
                this.style.color = "#2f2f2f";
            }
        });
    });

    // Form submission
    const form = document.querySelector(".reservation-form-compact");
    if (form) {
        const submitBtn = document.querySelector(".reserve-btn-compact");
        if (submitBtn) {
            submitBtn.addEventListener("click", function (e) {
                e.preventDefault();
                alert("Reservation created successfully! (This is a demo)");
            });
        }
    }

    // Month navigation
    const monthNav = document.querySelectorAll(".cal-nav");
    monthNav.forEach((btn) => {
        btn.addEventListener("click", function () {
            console.log("Month navigation clicked");
        });
    });
}

// ===== UPDATE RESERVATION PAGE SCRIPTS =====
function initUpdateReservation() {
    const searchBtn = document.getElementById("searchUpdateBtn");
    const updateContainer = document.getElementById("updateContainer");
    const noResults = document.getElementById("noUpdateResults");

    if (searchBtn) {
        searchBtn.addEventListener("click", function () {
            const searchInput =
                document.getElementById("updateSearchInput").value;

            if (searchInput.trim()) {
                // Simulate search (in real app, this would be an API call)
                setTimeout(() => {
                    updateContainer.style.display = "block";
                    noResults.style.display = "none";
                }, 500);
            } else {
                alert("Please enter a Reservation ID or Email");
            }
        });
    }

    // Quantity controls
    const qtyBtns = document.querySelectorAll(".qty-btn");
    qtyBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const qtyValue = this.parentElement.querySelector(".qty-value");
            let currentValue = parseInt(qtyValue.textContent);

            if (this.classList.contains("plus")) {
                currentValue++;
            } else if (this.classList.contains("minus") && currentValue > 0) {
                currentValue--;
            }

            qtyValue.textContent = currentValue;
            updatePricing();
        });
    });

    // Update form submission
    const updateForm = document.getElementById("updateReservationForm");
    if (updateForm) {
        updateForm.addEventListener("submit", function (e) {
            e.preventDefault();
            alert("Reservation updated successfully! (This is a demo)");
        });
    }

    // Cancel button
    const cancelBtn = document.querySelector(".cancel-btn");
    if (cancelBtn) {
        cancelBtn.addEventListener("click", function () {
            updateContainer.style.display = "none";
            document.getElementById("updateSearchInput").value = "";
        });
    }

    function updatePricing() {
        // Placeholder for pricing calculation
        console.log("Pricing updated");
    }
}

// ===== VIEW RESERVATION PAGE SCRIPTS =====
function initViewReservation() {
    // Expand/collapse cards
    const expandBtns = document.querySelectorAll(".card-expand-btn");
    expandBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            const reservationId = this.dataset.reservationId;
            const expandedInfo = document.getElementById(
                `expanded-${reservationId}`
            );

            if (expandedInfo) {
                if (
                    expandedInfo.style.display === "none" ||
                    !expandedInfo.style.display
                ) {
                    expandedInfo.style.display = "block";
                    this.textContent = "▲";
                } else {
                    expandedInfo.style.display = "none";
                    this.textContent = "▼";
                }
            }
        });
    });

    // Status filter
    const statusFilter = document.getElementById("statusFilter");
    if (statusFilter) {
        statusFilter.addEventListener("change", function () {
            const selectedStatus = this.value.toLowerCase();
            const cards = document.querySelectorAll(".reservation-card-view");

            cards.forEach((card) => {
                const statusBadge = card.querySelector(
                    ".status-compact, .status-badge"
                );
                if (selectedStatus === "all") {
                    card.style.display = "block";
                } else {
                    const cardStatus =
                        statusBadge.classList.contains(selectedStatus);
                    card.style.display = cardStatus ? "block" : "none";
                }
            });
        });
    }

    // Search filter
    const searchInput = document.getElementById("viewSearchInput");
    if (searchInput) {
        searchInput.addEventListener("input", function () {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll(".reservation-card-view");

            cards.forEach((card) => {
                const cardText = card.textContent.toLowerCase();
                card.style.display = cardText.includes(searchTerm)
                    ? "block"
                    : "none";
            });
        });
    }

    // Pagination buttons
    const pageButtons = document.querySelectorAll(
        ".page-btn, .page-btn-compact"
    );
    pageButtons.forEach((btn) => {
        btn.addEventListener("click", function () {
            if (!this.disabled) {
                console.log("Page navigation:", this.textContent);
                // Placeholder for pagination logic
            }
        });
    });
}

// ===== DELETE RESERVATION PAGE SCRIPTS =====
function initDeleteReservation() {
    const searchBtn = document.getElementById("searchDeleteBtn");
    const deleteContainer = document.getElementById("deleteContainer");
    const noResults = document.getElementById("noDeleteResults");
    const confirmCheck = document.getElementById("deleteConfirmCheck");
    const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
    const cancelDeleteBtn = document.getElementById("cancelDeleteBtn");
    const successModal = document.getElementById("deleteSuccessModal");
    const closeModalBtn = document.getElementById("closeSuccessModal");

    if (searchBtn) {
        searchBtn.addEventListener("click", function () {
            const searchInput =
                document.getElementById("deleteSearchInput").value;

            if (searchInput.trim()) {
                // Simulate search
                setTimeout(() => {
                    deleteContainer.style.display = "block";
                    noResults.style.display = "none";
                }, 500);
            } else {
                alert("Please enter a Reservation ID or Email");
            }
        });
    }

    // Enable/disable delete button based on checkbox
    if (confirmCheck && confirmDeleteBtn) {
        confirmCheck.addEventListener("change", function () {
            confirmDeleteBtn.disabled = !this.checked;
        });
    }

    // Confirm delete button
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener("click", function () {
            if (!this.disabled) {
                // Show success modal
                successModal.style.display = "flex";

                // Reset form
                setTimeout(() => {
                    deleteContainer.style.display = "none";
                    document.getElementById("deleteSearchInput").value = "";
                    confirmCheck.checked = false;
                    confirmDeleteBtn.disabled = true;
                }, 100);
            }
        });
    }

    // Cancel button
    if (cancelDeleteBtn) {
        cancelDeleteBtn.addEventListener("click", function () {
            deleteContainer.style.display = "none";
            document.getElementById("deleteSearchInput").value = "";
            if (confirmCheck) confirmCheck.checked = false;
            if (confirmDeleteBtn) confirmDeleteBtn.disabled = true;
        });
    }

    // Close modal
    if (closeModalBtn && successModal) {
        closeModalBtn.addEventListener("click", function () {
            successModal.style.display = "none";
        });

        // Close modal on backdrop click
        const backdrop = successModal.querySelector(".modal-backdrop");
        if (backdrop) {
            backdrop.addEventListener("click", function () {
                successModal.style.display = "none";
            });
        }
    }

    // Cancellation reason validation
    const reasonSelect = document.getElementById("cancellationReason");
    if (reasonSelect) {
        reasonSelect.addEventListener("change", function () {
            console.log("Cancellation reason selected:", this.value);
        });
    }
}

// ===== UPDATE INFO PAGE SCRIPTS =====
function initUpdateInfo() {
    const form = document.getElementById("updateInfoForm");
    const cancelBtn = document.getElementById("cancelBtn");

    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // Validate passwords if they're being changed
            const newPassword = document.getElementById("newPassword");
            const confirmPassword = document.getElementById("confirmPassword");
            const currentPassword = document.getElementById("currentPassword");

            if (newPassword && confirmPassword && currentPassword) {
                if (
                    newPassword.value ||
                    confirmPassword.value ||
                    currentPassword.value
                ) {
                    if (!currentPassword.value) {
                        alert(
                            "Please enter your current password to change it"
                        );
                        return;
                    }

                    if (newPassword.value !== confirmPassword.value) {
                        alert("New passwords do not match");
                        return;
                    }

                    if (newPassword.value.length < 8) {
                        alert("Password must be at least 8 characters long");
                        return;
                    }
                }
            }

            // In a real app, this would send data to server
            alert("Information updated successfully! (This is a demo)");
        });
    }

    if (cancelBtn) {
        cancelBtn.addEventListener("click", function () {
            if (confirm("Are you sure you want to discard your changes?")) {
                form.reset();
            }
        });
    }
}

// ============================================
// UPDATE RESERVATION MODAL FUNCTIONALITY
// ============================================
document.addEventListener("DOMContentLoaded", function () {
    const updateModal = document.getElementById("updateModal");
    const closeModalBtn = document.getElementById("closeUpdateModal");
    const modalBackdrop = document.querySelector(".modal-backdrop-update");
    const selectButtons = document.querySelectorAll(".update-select-btn");
    const saveUpdateBtn = document.getElementById("saveUpdateBtn");

    // Open modal when SELECT button is clicked
    selectButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.stopPropagation();
            const card = this.closest(".update-selectable");
            const reservationId = card.getAttribute("data-reservation-id");

            // Here you would fetch the reservation data via AJAX
            // For now, just open the modal
            console.log("Opening update modal for reservation:", reservationId);

            updateModal.style.display = "flex";
            document.body.style.overflow = "hidden"; // Prevent background scrolling
        });
    });

    // Close modal when X button is clicked
    if (closeModalBtn) {
        closeModalBtn.addEventListener("click", function () {
            updateModal.style.display = "none";
            document.body.style.overflow = "auto";
        });
    }

    // Close modal when backdrop is clicked
    if (modalBackdrop) {
        modalBackdrop.addEventListener("click", function () {
            updateModal.style.display = "none";
            document.body.style.overflow = "auto";
        });
    }

    // Close modal on ESC key
    document.addEventListener("keydown", function (e) {
        if (
            e.key === "Escape" &&
            updateModal &&
            updateModal.style.display === "flex"
        ) {
            updateModal.style.display = "none";
            document.body.style.overflow = "auto";
        }
    });

    // Handle participant toggles in update modal
    document.querySelectorAll(".update-toggle").forEach((button) => {
        button.addEventListener("click", function () {
            const current = this.textContent.trim();
            if (current.startsWith("✓")) {
                this.textContent = "✕" + current.substring(1);
                this.style.background = "transparent";
                this.style.color = "#fff4e2";
            } else {
                this.textContent = "✓" + current.substring(1);
                this.style.background = "#fbaa56";
                this.style.color = "#2f2f2f";
            }
        });
    });

    // Handle time slot selection in update modal
    document.querySelectorAll(".update-time").forEach((slot) => {
        slot.addEventListener("click", function () {
            document.querySelectorAll(".update-time").forEach((s) => {
                s.style.background = "#3f3f3fff";
                s.style.borderColor = "#3f3f3fff";
                s.style.color = "#fff4e2";
            });
            this.style.background = "#fbaa56";
            this.style.borderColor = "#ffc300";
            this.style.color = "#2f2f2f";
        });
    });

    // Handle calendar day selection in update modal
    document.querySelectorAll(".update-cal-day").forEach((day) => {
        day.addEventListener("click", function () {
            if (this.classList.contains("dis")) return;

            document.querySelectorAll(".update-cal-day").forEach((d) => {
                d.classList.remove("sel");
            });
            this.classList.add("sel");
        });
    });

    // Handle save changes button
    if (saveUpdateBtn) {
        saveUpdateBtn.addEventListener("click", function () {
            // Here you would submit the updated reservation via AJAX
            console.log("Saving reservation changes...");

            // Show success message
            alert("Reservation updated successfully!");

            // Close modal
            updateModal.style.display = "none";
            document.body.style.overflow = "auto";
        });
    }

    // Search functionality for update reservations
    const updateSearchInput = document.getElementById("updateSearchInput");
    const updateSearchBtn = document.getElementById("searchUpdateBtn");

    if (updateSearchBtn && updateSearchInput) {
        updateSearchBtn.addEventListener("click", function () {
            const query = updateSearchInput.value.trim().toLowerCase();

            if (!query) {
                // Show all reservations
                document
                    .querySelectorAll(".update-selectable")
                    .forEach((card) => {
                        card.style.display = "block";
                    });
                return;
            }

            // Filter reservations
            document.querySelectorAll(".update-selectable").forEach((card) => {
                const id = card
                    .getAttribute("data-reservation-id")
                    .toLowerCase();
                const text = card.textContent.toLowerCase();

                if (id.includes(query) || text.includes(query)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });

        // Also search on Enter key
        updateSearchInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                updateSearchBtn.click();
            }
        });
    }
});
