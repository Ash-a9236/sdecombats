<?php
// View Reservations Page Component - Compact Clean Design
?>
<div class="reservation-page view-page">
    <div class="page-header">
        <h1 class="page-title">My Reservations</h1>
    </div>

    <!-- Compact Filters -->
    <div class="filters-compact">
        <select class="filter-compact" id="statusFilter">
            <option value="all">All Status</option>
            <option value="active">Active</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>
        <input type="text" class="filter-compact" placeholder="Search..." id="viewSearchInput">
    </div>

    <!-- Compact Reservation Cards -->
    <div class="reservations-list-compact">

        <!-- Card 1 - Active -->
        <div class="res-card-compact reservation-card-view">
            <div class="res-card-header-compact">
                <span class="res-id-compact">#12345</span>
                <span class="status-compact active">ACTIVE</span>
                <button class="expand-compact card-expand-btn" data-reservation-id="12345">▼</button>
            </div>

            <div class="res-card-body-compact">
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Name:</span>
                    <span class="res-value-compact">John Doe</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Activity:</span>
                    <span class="res-value-compact">Weapon Throwing - Initiation</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Date:</span>
                    <span class="res-value-compact">Nov 13, 2024 at 18H00</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Total:</span>
                    <span class="res-value-compact price-highlight">$381.74</span>
                </div>
            </div>

            <div class="res-expanded-compact" id="expanded-12345" style="display: none;">
                <div class="exp-divider-compact"></div>
                <div class="exp-section-compact">
                    <p class="exp-title-compact">Participants</p>
                    <p class="exp-text-compact">• 2x Adult (17+) - Equipment Rental</p>
                    <p class="exp-text-compact">• 1x Young (13-17)</p>
                </div>
                <div class="exp-section-compact">
                    <p class="exp-title-compact">Pricing</p>
                    <div class="exp-price-row-compact">
                        <span>Activity Base (x3)</span>
                        <span>299.97</span>
                    </div>
                    <div class="exp-price-row-compact">
                        <span>Equipment (x2)</span>
                        <span>+31.98</span>
                    </div>
                    <div class="exp-price-row-compact total-exp">
                        <span>TOTAL</span>
                        <span>381.74</span>
                    </div>
                </div>
                <p class="exp-meta-compact">Booked: Nov 1, 2024 at 14:32</p>
            </div>
        </div>

        <!-- Card 2 - Completed -->
        <div class="res-card-compact reservation-card-view">
            <div class="res-card-header-compact">
                <span class="res-id-compact">#12344</span>
                <span class="status-compact completed">COMPLETED</span>
                <button class="expand-compact card-expand-btn" data-reservation-id="12344">▼</button>
            </div>

            <div class="res-card-body-compact">
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Name:</span>
                    <span class="res-value-compact">Jane Smith</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Activity:</span>
                    <span class="res-value-compact">Archery Classes - Beginner Plus</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Date:</span>
                    <span class="res-value-compact">Nov 6, 2024 at 19H00</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Total:</span>
                    <span class="res-value-compact price-highlight">$114.99</span>
                </div>
            </div>

            <div class="res-expanded-compact" id="expanded-12344" style="display: none;">
                <div class="exp-divider-compact"></div>
                <div class="exp-section-compact">
                    <p class="exp-title-compact">Participants</p>
                    <p class="exp-text-compact">• 1x Adult (17+)</p>
                </div>
                <div class="exp-section-compact">
                    <p class="exp-title-compact">Pricing</p>
                    <div class="exp-price-row-compact">
                        <span>Activity Base</span>
                        <span>99.99</span>
                    </div>
                    <div class="exp-price-row-compact total-exp">
                        <span>TOTAL</span>
                        <span>114.99</span>
                    </div>
                </div>
                <p class="exp-meta-compact">Booked: Oct 28, 2024 at 09:15</p>
            </div>
        </div>

        <!-- Card 3 - Cancelled -->
        <div class="res-card-compact reservation-card-view">
            <div class="res-card-header-compact">
                <span class="res-id-compact">#12343</span>
                <span class="status-compact cancelled">CANCELLED</span>
                <button class="expand-compact card-expand-btn" data-reservation-id="12343">▼</button>
            </div>

            <div class="res-card-body-compact">
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Name:</span>
                    <span class="res-value-compact">Mike Johnson</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Activity:</span>
                    <span class="res-value-compact">Rage Cage - Session</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Date:</span>
                    <span class="res-value-compact">Nov 10, 2024 at 20H00</span>
                </div>
                <div class="res-info-row-compact">
                    <span class="res-label-compact">Refund:</span>
                    <span class="res-value-compact price-highlight">$223.85</span>
                </div>
            </div>

            <div class="res-expanded-compact" id="expanded-12343" style="display: none;">
                <div class="exp-divider-compact"></div>
                <div class="exp-section-compact">
                    <p class="exp-title-compact">Participants</p>
                    <p class="exp-text-compact">• 1x Adult (17+) - Equipment Rental</p>
                    <p class="exp-text-compact">• 2x Child (7-12)</p>
                </div>
                <div class="exp-section-compact">
                    <p class="exp-title-compact">Refund Info</p>
                    <div class="exp-price-row-compact total-exp">
                        <span>Refund Issued</span>
                        <span>223.85</span>
                    </div>
                </div>
                <p class="exp-meta-compact">Cancelled: Nov 8, 2024</p>
            </div>
        </div>

    </div>

    <!-- Compact Pagination -->
    <div class="pagination-compact">
        <button class="page-btn-compact" disabled>◀</button>
        <span class="page-info-compact">Page 1 of 3</span>
        <button class="page-btn-compact">▶</button>
    </div>
</div>
