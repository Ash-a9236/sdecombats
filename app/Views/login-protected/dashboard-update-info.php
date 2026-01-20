<?php
// Update Reservation Component - Search and Select
?>
<div class="page-header">
    <h1 class="page-title">UPDATE RESERVATION</h1>
    <p class="page-subtitle">Search and select a reservation to modify</p>
</div>

<!-- Search Bar -->
<div class="filters-compact" style="max-width: 600px; margin-bottom: 2rem;">
    <input type="text" class="filter-compact" placeholder="Search by ID or Email" id="updateSearchInput">
    <button type="button" class="search-btn-compact" id="searchUpdateBtn">SEARCH</button>
</div>

<!-- Reservations List to Select -->
<div class="reservations-list-compact" id="updateReservationsList">
    <!-- Sample Reservation Cards - User clicks to open update modal -->
    <div class="res-card-compact update-selectable" data-reservation-id="12345">
        <div class="res-card-header-compact">
            <span class="res-id-compact">#12345</span>
            <span class="status-compact active">ACTIVE</span>
            <button class="expand-compact update-select-btn">SELECT</button>
        </div>
        <div class="res-card-body-compact">
            <div class="res-info-row-compact">
                <span class="res-label-compact">ACTIVITY</span>
                <span class="res-value-compact">Weapon Throwing</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">DATE</span>
                <span class="res-value-compact">Dec 15, 2024</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">TIME</span>
                <span class="res-value-compact">14H00</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">TOTAL</span>
                <span class="res-value-compact price-highlight">$249.99</span>
            </div>
        </div>
    </div>

    <div class="res-card-compact update-selectable" data-reservation-id="12346">
        <div class="res-card-header-compact">
            <span class="res-id-compact">#12346</span>
            <span class="status-compact active">ACTIVE</span>
            <button class="expand-compact update-select-btn">SELECT</button>
        </div>
        <div class="res-card-body-compact">
            <div class="res-info-row-compact">
                <span class="res-label-compact">ACTIVITY</span>
                <span class="res-value-compact">Archery Classes</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">DATE</span>
                <span class="res-value-compact">Dec 20, 2024</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">TIME</span>
                <span class="res-value-compact">10H00</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">TOTAL</span>
                <span class="res-value-compact price-highlight">$189.99</span>
            </div>
        </div>
    </div>

    <div class="res-card-compact update-selectable" data-reservation-id="12347">
        <div class="res-card-header-compact">
            <span class="res-id-compact">#12347</span>
            <span class="status-compact active">ACTIVE</span>
            <button class="expand-compact update-select-btn">SELECT</button>
        </div>
        <div class="res-card-body-compact">
            <div class="res-info-row-compact">
                <span class="res-label-compact">ACTIVITY</span>
                <span class="res-value-compact">Rage Cage</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">DATE</span>
                <span class="res-value-compact">Dec 22, 2024</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">TIME</span>
                <span class="res-value-compact">19H00</span>
            </div>
            <div class="res-info-row-compact">
                <span class="res-label-compact">TOTAL</span>
                <span class="res-value-compact price-highlight">$299.99</span>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal (Hidden by default) -->
<div id="updateModal" class="update-modal" style="display: none;">
    <div class="modal-backdrop-update"></div>
    <div class="modal-container-update">
        <!-- Close Button -->
        <button class="modal-close-btn" id="closeUpdateModal">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <!-- Reuse Make Reservation Form -->
        <div class="reservation-form-container-compact">
            <div class="reservation-form-compact">
                <div class="reservation-grid">
                    <!-- Left Column -->
                    <div class="left-column">
                        <div class="reservation-image-placeholder">
                            <img src="/assets/images/placeholders/image_placeholder01.png" alt="Activity">
                        </div>

                        <div class="activity-compact">
                            <div class="activity-info-compact">
                                <p class="activity-name-compact">WEAPON THROWING</p>
                                <p class="activity-price-compact">$79.99</p>
                            </div>
                        </div>

                        <div class="pricing-compact">
                            <div class="price-line">
                                <span>Activity (x2)</span>
                                <span>$159.98</span>
                            </div>
                            <div class="price-line">
                                <span>Equipment (x1)</span>
                                <span>$15.99</span>
                            </div>
                            <div class="price-divider-compact"></div>
                            <div class="price-line">
                                <span>Subtotal</span>
                                <span>$175.97</span>
                            </div>
                            <div class="price-line">
                                <span>Taxes (15%)</span>
                                <span>$26.40</span>
                            </div>
                            <div class="price-divider-compact"></div>
                            <div class="price-line total-line">
                                <span>TOTAL</span>
                                <span>$202.37</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="right-column">
                        <h3 class="form-title-compact">UPDATE DETAILS</h3>

                        <input type="text" class="input-compact" placeholder="Full Name" value="John Doe">
                        <input type="email" class="input-compact" placeholder="Email" value="john@email.com">
                        <input type="tel" class="input-compact" placeholder="Phone" value="+1 555-0123">

                        <h3 class="form-title-compact">PARTICIPANTS</h3>
                        <div class="participants-compact">
                            <div class="participant-line">
                                <button class="toggle-compact update-toggle" data-type="adult">✓ ADULT (17+)</button>
                                <label class="check-compact">
                                    <input type="checkbox" class="eq-check" checked>
                                    <span>Equipment</span>
                                </label>
                            </div>
                            <div class="participant-line">
                                <button class="toggle-compact update-toggle" data-type="young">✓ YOUNG (13-17)</button>
                                <label class="check-compact">
                                    <input type="checkbox" class="eq-check">
                                    <span>Equipment</span>
                                </label>
                            </div>
                            <div class="participant-line">
                                <button class="toggle-compact update-toggle" data-type="child">✕ CHILD (7-12)</button>
                                <label class="check-compact">
                                    <input type="checkbox" class="eq-check">
                                    <span>Equipment</span>
                                </label>
                            </div>
                        </div>

                        <h3 class="form-title-compact">SELECT TIME</h3>
                        <div class="times-compact">
                            <div class="time-compact update-time">10H00<span>8 spots</span></div>
                            <div class="time-compact update-time">12H00<span>5 spots</span></div>
                            <div class="time-compact update-time">14H00<span>10 spots</span></div>
                            <div class="time-compact update-time">16H00<span>3 spots</span></div>
                            <div class="time-compact update-time">18H00<span>12 spots</span></div>
                            <div class="time-compact update-time">20H00<span>6 spots</span></div>
                        </div>

                        <h3 class="form-title-compact">SELECT DATE</h3>
                        <div class="calendar-compact">
                            <div class="cal-header-compact">
                                <button class="cal-nav update-cal-nav">←</button>
                                <span class="cal-month">DECEMBER 2024</span>
                                <button class="cal-nav update-cal-nav">→</button>
                            </div>
                            <div class="cal-grid-compact">
                                <span class="cal-day-h">S</span>
                                <span class="cal-day-h">M</span>
                                <span class="cal-day-h">T</span>
                                <span class="cal-day-h">W</span>
                                <span class="cal-day-h">T</span>
                                <span class="cal-day-h">F</span>
                                <span class="cal-day-h">S</span>

                                <div class="cal-day update-cal-day">1</div>
                                <div class="cal-day update-cal-day">2</div>
                                <div class="cal-day update-cal-day">3</div>
                                <div class="cal-day update-cal-day">4</div>
                                <div class="cal-day update-cal-day">5</div>
                                <div class="cal-day update-cal-day">6</div>
                                <div class="cal-day update-cal-day">7</div>
                                <div class="cal-day update-cal-day">8</div>
                                <div class="cal-day update-cal-day">9</div>
                                <div class="cal-day update-cal-day">10</div>
                                <div class="cal-day update-cal-day">11</div>
                                <div class="cal-day update-cal-day">12</div>
                                <div class="cal-day update-cal-day sel">13</div>
                                <div class="cal-day update-cal-day">14</div>
                                <div class="cal-day update-cal-day">15</div>
                                <div class="cal-day update-cal-day">16</div>
                                <div class="cal-day update-cal-day">17</div>
                                <div class="cal-day update-cal-day">18</div>
                                <div class="cal-day update-cal-day">19</div>
                                <div class="cal-day update-cal-day">20</div>
                                <div class="cal-day update-cal-day">21</div>
                                <div class="cal-day update-cal-day">22</div>
                                <div class="cal-day update-cal-day">23</div>
                                <div class="cal-day update-cal-day">24</div>
                                <div class="cal-day update-cal-day">25</div>
                                <div class="cal-day update-cal-day">26</div>
                                <div class="cal-day update-cal-day">27</div>
                                <div class="cal-day update-cal-day">28</div>
                                <div class="cal-day update-cal-day">29</div>
                                <div class="cal-day update-cal-day">30</div>
                                <div class="cal-day update-cal-day">31</div>
                            </div>
                        </div>

                        <button class="reserve-btn-compact" id="saveUpdateBtn">SAVE CHANGES</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>