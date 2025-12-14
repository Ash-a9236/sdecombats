<?php

use App\Helpers\UserContext;
use App\Helpers\ViewHelper;

ViewHelper::loadHeader('');

$user = UserContext::getCurrentUser();

?>

<!-- Main Activities Section -->
<main class="activities-page">
    <!-- Hero Search Section -->
    <section class="activities-hero">
        <div class="hero-content">
            <h1 class="hero-title">OUR ACTIVITIES</h1>
            <p class="hero-subtitle">Discover thrilling combat sports experiences</p>

            <!-- Search Bar -->
            <div class="search-container">
                <div class="search-box-activities">
                    <input
                        type="text"
                        class="search-input-activities"
                        placeholder="Search activities..."
                        id="activitySearch">
                    <button class="search-btn-activities" id="searchBtn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                </div>

                <!-- Filter Buttons -->
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All</button>
                    <button class="filter-btn" data-filter="archery">Archery</button>
                    <button class="filter-btn" data-filter="throwing">Throwing</button>
                    <button class="filter-btn" data-filter="combat">Combat</button>
                    <button class="filter-btn" data-filter="rage">Rage Room</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Grid -->
    <section class="activities-grid-section">
        <div class="activities-container">

            <!-- Activity Card 1 - Weapon Throwing -->
            <article class="activity-card" data-category="throwing">
                <div class="activity-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Weapon Throwing">
                </div>
                <div class="activity-content">
                    <h3 class="activity-title">WEAPON THROWING</h3>
                    <p class="activity-description">Axe & knife throwing in Canada's largest arena. Perfect for groups and events!</p>

                    <div class="activity-details">
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Participants">
                            <span>1-20 people</span>
                        </div>
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>60-90 min</span>
                        </div>
                    </div>

                    <div class="activity-footer">
                        <div class="activity-price">
                            <span class="price-label">FROM</span>
                            <span class="price-amount">$79.99</span>
                        </div>
                        <button class="book-btn">BOOK NOW</button>
                    </div>
                </div>
            </article>

            <!-- Activity Card 2 - ArcheryTime -->
            <article class="activity-card" data-category="archery">
                <div class="activity-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="ArcheryTime">
                </div>
                <div class="activity-content">
                    <h3 class="activity-title">ARCHERYTIME</h3>
                    <p class="activity-description">Dynamic virtual archery experience with interactive targets and challenges.</p>

                    <div class="activity-details">
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Participants">
                            <span>1-12 people</span>
                        </div>
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>45-60 min</span>
                        </div>
                    </div>

                    <div class="activity-footer">
                        <div class="activity-price">
                            <span class="price-label">FROM</span>
                            <span class="price-amount">$69.99</span>
                        </div>
                        <button class="book-btn">BOOK NOW</button>
                    </div>
                </div>
            </article>

            <!-- Activity Card 3 - Rage Cage -->
            <article class="activity-card" data-category="rage">
                <div class="activity-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Rage Cage">
                </div>
                <div class="activity-content">
                    <h3 class="activity-title">RAGE CAGE</h3>
                    <p class="activity-description">Demolition room where you can smash and destroy. Perfect stress relief!</p>

                    <div class="activity-details">
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Participants">
                            <span>1-6 people</span>
                        </div>
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>30-45 min</span>
                        </div>
                    </div>

                    <div class="activity-footer">
                        <div class="activity-price">
                            <span class="price-label">FROM</span>
                            <span class="price-amount">$59.99</span>
                        </div>
                        <button class="book-btn">BOOK NOW</button>
                    </div>
                </div>
            </article>

            <!-- Activity Card 4 - Combat Archery -->
            <article class="activity-card" data-category="archery combat">
                <div class="activity-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Combat Archery">
                </div>
                <div class="activity-content">
                    <h3 class="activity-title">COMBAT ARCHERY</h3>
                    <p class="activity-description">Team-based archery combat with foam-tipped arrows. Strategy meets adrenaline!</p>

                    <div class="activity-details">
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/big-group.svg" alt="Participants">
                            <span>8-20 people</span>
                        </div>
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>90 min</span>
                        </div>
                    </div>

                    <div class="activity-footer">
                        <div class="activity-price">
                            <span class="price-label">FROM</span>
                            <span class="price-amount">$89.99</span>
                        </div>
                        <button class="book-btn">BOOK NOW</button>
                    </div>
                </div>
            </article>

            <!-- Activity Card 5 - Nerf Battle -->
            <article class="activity-card" data-category="combat">
                <div class="activity-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Nerf Battle">
                </div>
                <div class="activity-content">
                    <h3 class="activity-title">NERF BATTLE</h3>
                    <p class="activity-description">Montreal's largest Nerf arsenal. Epic battles for all ages in private arenas.</p>

                    <div class="activity-details">
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/big-group.svg" alt="Participants">
                            <span>8-30 people</span>
                        </div>
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>60-120 min</span>
                        </div>
                    </div>

                    <div class="activity-footer">
                        <div class="activity-price">
                            <span class="price-label">FROM</span>
                            <span class="price-amount">$49.99</span>
                        </div>
                        <button class="book-btn">BOOK NOW</button>
                    </div>
                </div>
            </article>

            <!-- Activity Card 6 - Archery Classes -->
            <article class="activity-card" data-category="archery">
                <div class="activity-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Archery Classes">
                </div>
                <div class="activity-content">
                    <h3 class="activity-title">ARCHERY CLASSES</h3>
                    <p class="activity-description">Professional instruction from beginner to advanced. Learn proper technique.</p>

                    <div class="activity-details">
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Participants">
                            <span>1-8 people</span>
                        </div>
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>60 min</span>
                        </div>
                    </div>

                    <div class="activity-footer">
                        <div class="activity-price">
                            <span class="price-label">FROM</span>
                            <span class="price-amount">$99.99</span>
                        </div>
                        <button class="book-btn">BOOK NOW</button>
                    </div>
                </div>
            </article>

            <!-- Activity Card 7 - Archery Practice -->
            <article class="activity-card" data-category="archery">
                <div class="activity-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Archery Practice">
                </div>
                <div class="activity-content">
                    <h3 class="activity-title">ARCHERY PRACTICE</h3>
                    <p class="activity-description">Open practice sessions and membership options for experienced archers.</p>

                    <div class="activity-details">
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Participants">
                            <span>1-4 people</span>
                        </div>
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>Flexible</span>
                        </div>
                    </div>

                    <div class="activity-footer">
                        <div class="activity-price">
                            <span class="price-label">FROM</span>
                            <span class="price-amount">$39.99</span>
                        </div>
                        <button class="book-btn">BOOK NOW</button>
                    </div>
                </div>
            </article>

            <!-- Activity Card 8 - Archery Pursuit -->
            <article class="activity-card" data-category="archery">
                <div class="activity-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Archery Pursuit">
                </div>
                <div class="activity-content">
                    <h3 class="activity-title">ARCHERY PURSUIT</h3>
                    <p class="activity-description">Advanced coaching and competition preparation for serious archers.</p>

                    <div class="activity-details">
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/trophy.svg" alt="Level">
                            <span>Advanced</span>
                        </div>
                        <div class="detail-item">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>Custom</span>
                        </div>
                    </div>

                    <div class="activity-footer">
                        <div class="activity-price">
                            <span class="price-label">FROM</span>
                            <span class="price-amount">$149.99</span>
                        </div>
                        <button class="book-btn">BOOK NOW</button>
                    </div>
                </div>
            </article>

        </div>

        <!-- No Results Message -->
        <div class="no-results" id="noResults" style="display: none;">
            <img src="/sdecombats/public/assets/icons/white/question.svg" alt="No results" style="width: 4rem; height: 4rem; margin-bottom: 1rem; opacity: 0.5;">
            <p class="no-results-text">No activities found matching your search.</p>
            <button class="clear-search-btn" id="clearSearch">Clear Search</button>
        </div>
    </section>
</main>
<!-- Bottom Divider -->
<div class="activities-bottom-divider"></div>
<?php
ViewHelper::loadFooter();
?>