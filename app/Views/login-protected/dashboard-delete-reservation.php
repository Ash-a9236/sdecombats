<?php
// Delete Reservation Page Component
?>
<div class="reservation-page delete-page">
    <div class="page-header">
        <h1 class="page-title">Delete Reservation</h1>
        <p class="page-subtitle">Search for a reservation to cancel</p>
    </div>

    <div class="reservation-search">
        <div class="search-box">
            <input type="text" class="search-input" placeholder="Enter Reservation ID or Email" id="deleteSearchInput">
            <button type="button" class="search-btn" id="searchDeleteBtn">Search</button>
        </div>
    </div>

    <div class="reservation-delete-container" id="deleteContainer" style="display: none;">
        <div class="warning-banner">
            <span class="warning-icon">⚠</span>
            <p class="warning-text">Warning: This action cannot be undone. Please review the details carefully before confirming deletion.</p>
        </div>

        <div class="reservation-card delete-card">
            <div class="reservation-header">
                <h3 class="reservation-id">Reservation #12345</h3>
                <span class="reservation-status active">Active</span>
            </div>

            <div class="reservation-details">
                <div class="detail-section">
                    <h4 class="section-subtitle">Customer Information</h4>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <span class="detail-icon">👤</span>
                            <div class="detail-content">
                                <p class="detail-label">Full Name</p>
                                <p class="detail-value">John Doe</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">📧</span>
                            <div class="detail-content">
                                <p class="detail-label">Email</p>
                                <p class="detail-value">john.doe@example.com</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">📱</span>
                            <div class="detail-content">
                                <p class="detail-label">Phone</p>
                                <p class="detail-value">+1 (555) 123-4567</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h4 class="section-subtitle">Reservation Details</h4>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <span class="detail-icon">🥋</span>
                            <div class="detail-content">
                                <p class="detail-label">Activity</p>
                                <p class="detail-value">Brazilian Jiu-Jitsu - Beginner</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">📅</span>
                            <div class="detail-content">
                                <p class="detail-label">Date</p>
                                <p class="detail-value">November 13, 2024</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">⏰</span>
                            <div class="detail-content">
                                <p class="detail-label">Time</p>
                                <p class="detail-value">18H00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h4 class="section-subtitle">Participants</h4>
                    <ul class="participants-list-delete">
                        <li>2x Adult (17+) with Equipment Rental</li>
                        <li>1x Young (13-17)</li>
                    </ul>
                </div>

                <div class="detail-section">
                    <h4 class="section-subtitle">Payment Summary</h4>
                    <div class="payment-summary">
                        <div class="payment-row">
                            <span class="payment-label">Total Paid</span>
                            <span class="payment-value">$381.74</span>
                        </div>
                        <div class="payment-row refund-row">
                            <span class="payment-label">Refund Amount</span>
                            <span class="payment-value refund-amount">$381.74</span>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h4 class="section-subtitle">Cancellation Reason</h4>
                    <div class="form-group">
                        <select class="form-select" id="cancellationReason">
                            <option value="">Select a reason...</option>
                            <option value="schedule-conflict">Schedule Conflict</option>
                            <option value="personal-reasons">Personal Reasons</option>
                            <option value="injury-illness">Injury or Illness</option>
                            <option value="found-alternative">Found Alternative</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-textarea" placeholder="Additional notes (optional)" rows="3" id="cancellationNotes"></textarea>
                    </div>
                </div>
            </div>

            <div class="confirmation-section">
                <label class="confirmation-checkbox">
                    <input type="checkbox" id="deleteConfirmCheck">
                    <span class="checkbox-text">I understand that this reservation will be permanently deleted and the customer will be notified via email.</span>
                </label>
            </div>

            <div class="form-actions delete-actions">
                <button type="button" class="cancel-btn" id="cancelDeleteBtn">Cancel</button>
                <button type="button" class="delete-btn" id="confirmDeleteBtn" disabled>Delete Reservation</button>
            </div>
        </div>
    </div>

    <div class="no-results" id="noDeleteResults" style="display: none;">
        <p class="no-results-text">No reservation found with that ID or email.</p>
    </div>

    <!-- Success Modal -->
    <div class="delete-modal" id="deleteSuccessModal" style="display: none;">
        <div class="modal-backdrop"></div>
        <div class="modal-content">
            <div class="modal-icon success">✓</div>
            <h3 class="modal-title">Reservation Deleted</h3>
            <p class="modal-message">The reservation has been successfully cancelled and the customer has been notified.</p>
            <button type="button" class="modal-btn" id="closeSuccessModal">Close</button>
        </div>
    </div>
</div>