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
            const activityPrice = activityCard
                .querySelector(".price-amount")
                .textContent.replace("$", "");

            // Open reservation modal
            openReservationModal(activityTitle, activityPrice);
        });
    });

    // Function to open reservation modal
    function openReservationModal(activityName, activityPrice) {
        // Create modal if it doesn't exist
        if (!document.getElementById("reservationModal")) {
            createReservationModal();
        }

        const modal = document.getElementById("reservationModal");

        // Show modal
        modal.style.display = "flex";
        document.body.style.overflow = "hidden";

        // Set activity name and price in the pricing section
        const activityNameElement = modal.querySelector(
            "#selectedActivityName"
        );
        const activityPriceElement = modal.querySelector(
            "#selectedActivityPrice"
        );

        if (activityNameElement) {
            activityNameElement.textContent = activityName;
        }
        if (activityPriceElement) {
            activityPriceElement.textContent = activityPrice;
        }

        // Trigger entrance animation
        setTimeout(() => {
            modal.classList.add("modal-active");
        }, 10);
    }

    // Function to create reservation modal
    function createReservationModal() {
        const modalHTML = `
            <div id="reservationModal" class="reservation-modal">
                <div class="reservation-modal-backdrop"></div>
                <div class="reservation-modal-content">
                    <button class="reservation-modal-close" id="closeReservationModal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <div class="reservation-modal-header">
                        <h2 class="reservation-modal-title">MAKE RESERVATION</h2>
                    </div>
                    <div class="reservation-modal-body" id="reservationFormContainer">
                        ${getReservationFormHTML()}
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML("beforeend", modalHTML);

        // Close modal functionality
        const modal = document.getElementById("reservationModal");
        const closeBtn = document.getElementById("closeReservationModal");
        const backdrop = modal.querySelector(".reservation-modal-backdrop");

        closeBtn.addEventListener("click", closeReservationModal);
        backdrop.addEventListener("click", closeReservationModal);

        // ESC key to close
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape" && modal.style.display === "flex") {
                closeReservationModal();
            }
        });

        // Initialize form functionality
        initializeModalForm();
    }

    // Function to close reservation modal
    function closeReservationModal() {
        const modal = document.getElementById("reservationModal");
        modal.classList.remove("modal-active");

        setTimeout(() => {
            modal.style.display = "none";
            document.body.style.overflow = "";
        }, 300);
    }

    // Function to get reservation form HTML
    function getReservationFormHTML() {
        return `
            <div class="reservation-form-container-compact">
                <form class="reservation-form-compact" id="makeReservationForm">

                    <div class="reservation-grid">

                        <div class="left-column">
                            <div class="reservation-image-placeholder">
                                <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Activity Preview">
                            </div>

                            <!-- Ultra Compact Pricing -->
                            <div class="pricing-compact">
                                <div class="activity-compact">
                                    <div class="activity-info-compact">
                                        <p class="activity-name-compact" id="selectedActivityName">ACTIVITY NAME</p>
                                        <p class="activity-price-compact" id="selectedActivityPrice">99.99</p>
                                    </div>
                                    <button type="button" class="add-btn-compact">+</button>
                                </div>
                                <div class="price-divider-compact"></div>
                                <div class="price-line">
                                    <span>CLIENT EQUIPMENT RE...</span>
                                    <span>(included)</span>
                                </div>
                                <div class="price-line">
                                    <span>CLIENT EQUIPMENT RE...</span>
                                    <span>+15.99</span>
                                </div>
                                <div class="price-line">
                                    <span>CLIENT EQUIPMENT RE...</span>
                                    <span>30.99</span>
                                </div>
                                <div class="price-line">
                                    <span>CLIENT EQUIPMENT RE...</span>
                                    <span>+15.99</span>
                                </div>
                                <div class="price-divider-compact"></div>
                                <div class="price-line">
                                    <span>SUBTOTAL</span>
                                    <span>162.96</span>
                                </div>
                                <div class="price-line">
                                    <span>TAXES (15%)</span>
                                    <span>24.44</span>
                                </div>
                                <div class="price-divider-compact"></div>
                                <div class="price-line total-line">
                                    <span>TOTAL</span>
                                    <span>187.40</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - All Form Elements -->
                        <div class="right-column">
                            <!-- Compact User Inputs -->
                            <div>
                                <p class="form-title-compact">CONTACT INFO</p>
                            </div>
                            <input type="text" class="input-compact" placeholder="Full Name" required>
                            <input type="email" class="input-compact" placeholder="Email" required>
                            <input type="tel" class="input-compact" placeholder="Phone" required>

                            <!-- Ultra Compact Participants - Single Line -->
                            <div class="participants-compact">
                                <div class="participant-line">
                                    <button type="button" class="toggle-compact">+ ADULT (17+)</button>
                                    <label class="check-compact">
                                        <input type="checkbox" class="eq-check">
                                        EQUIPMENT RENTAL
                                    </label>
                                </div>
                                <div class="participant-line">
                                    <button type="button" class="toggle-compact">+ YOUNG (13-17)</button>
                                    <label class="check-compact">
                                        <input type="checkbox" class="eq-check">
                                        EQUIPMENT RENTAL
                                    </label>
                                </div>
                                <div class="participant-line">
                                    <button type="button" class="toggle-compact">+ CHILD (7-12)</button>
                                    <label class="check-compact">
                                        <input type="checkbox" class="eq-check">
                                        EQUIPMENT RENTAL
                                    </label>
                                </div>
                            </div>

                            <!-- Compact Time Slots Grid -->
                            <div class="times-compact">
                                <div class="time-compact">18H00<span>5 SPOTS</span></div>
                                <div class="time-compact">19H00<span>5 SPOTS</span></div>
                                <div class="time-compact">20H00<span>5 SPOTS</span></div>
                                <div class="time-compact">21H00<span>5 SPOTS</span></div>
                            </div>

                            <!-- Super Compact Calendar -->
                            <div class="calendar-compact">
                                <div class="cal-header-compact">
                                    <button type="button" class="cal-nav">◀</button>
                                    <span class="cal-month">December 2024</span>
                                    <button type="button" class="cal-nav">▶</button>
                                </div>
                                <div class="cal-grid-compact">
                                    <div class="cal-day-h">Mo</div>
                                    <div class="cal-day-h">Tu</div>
                                    <div class="cal-day-h">We</div>
                                    <div class="cal-day-h">Th</div>
                                    <div class="cal-day-h">Fr</div>
                                    <div class="cal-day-h">Sa</div>
                                    <div class="cal-day-h">Su</div>
                                    <div class="cal-day dis">25</div>
                                    <div class="cal-day dis">26</div>
                                    <div class="cal-day dis">27</div>
                                    <div class="cal-day dis">28</div>
                                    <div class="cal-day dis">29</div>
                                    <div class="cal-day dis">30</div>
                                    <div class="cal-day">1</div>
                                    <div class="cal-day">2</div>
                                    <div class="cal-day">3</div>
                                    <div class="cal-day">4</div>
                                    <div class="cal-day">5</div>
                                    <div class="cal-day">6</div>
                                    <div class="cal-day">7</div>
                                    <div class="cal-day">8</div>
                                    <div class="cal-day">9</div>
                                    <div class="cal-day">10</div>
                                    <div class="cal-day">11</div>
                                    <div class="cal-day">12</div>
                                    <div class="cal-day">13</div>
                                    <div class="cal-day">14</div>
                                    <div class="cal-day">15</div>
                                    <div class="cal-day">16</div>
                                    <div class="cal-day">17</div>
                                    <div class="cal-day">18</div>
                                    <div class="cal-day">19</div>
                                    <div class="cal-day">20</div>
                                    <div class="cal-day">21</div>
                                    <div class="cal-day">22</div>
                                    <div class="cal-day">23</div>
                                    <div class="cal-day">24</div>
                                    <div class="cal-day">25</div>
                                    <div class="cal-day">26</div>
                                    <div class="cal-day">27</div>
                                    <div class="cal-day">28</div>
                                    <div class="cal-day">29</div>
                                    <div class="cal-day">30</div>
                                    <div class="cal-day">31</div>
                                </div>
                            </div>

                            <!-- Compact Button -->
                            <button type="submit" class="reserve-btn-compact">RESERVE NOW</button>
                        </div>
                    </div>

                </form>
            </div>
        `;
    }

    // Initialize modal form functionality
    function initializeModalForm() {
        const form = document.getElementById("makeReservationForm");
        if (!form) return;

        const toggleButtons = form.querySelectorAll(".toggle-compact");
        const calendarDays = form.querySelectorAll(".cal-day:not(.dis)");
        const timeSlots = form.querySelectorAll(".time-compact");

        // Participant toggle functionality
        toggleButtons.forEach((button) => {
            button.addEventListener("click", function () {
                // Toggle between + and ✕
                if (this.textContent.startsWith("+")) {
                    this.textContent = this.textContent.replace("+", "✕");
                    this.classList.add("active");
                } else {
                    this.textContent = this.textContent.replace("✕", "+");
                    this.classList.remove("active");
                }
            });
        });

        // Calendar day selection
        calendarDays.forEach((day) => {
            day.addEventListener("click", function () {
                calendarDays.forEach((d) => d.classList.remove("sel"));
                this.classList.add("sel");
            });
        });

        // Time slot selection
        timeSlots.forEach((slot) => {
            slot.addEventListener("click", function () {
                timeSlots.forEach((s) => s.classList.remove("sel"));
                this.classList.add("sel");
            });
        });

        // Form submission
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            alert("Reservation submitted! (Backend integration pending)");
            closeReservationModal();
        });
    }

    // Smooth scroll animations on card hover
    activityCards.forEach((card) => {
        card.addEventListener("mouseenter", function () {
            this.style.transition = "all 0.3s ease";
        });
    });
});
