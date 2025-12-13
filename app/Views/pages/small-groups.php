<?php

use App\Helpers\UserContext;
use App\Helpers\ViewHelper;

ViewHelper::loadHeader('');

$user = UserContext::getCurrentUser();

?>

<!-- Small Groups Page -->
<main class="small-groups-page">
    <!-- Hero Section -->
    <section class="small-groups-hero">
        <div class="hero-content-sg">
            <h1 class="hero-title-sg">SMALL GROUP EXPERIENCES</h1>
            <p class="hero-subtitle-sg">Perfect for dates, friends, and team building</p>

            <!-- Quick Nav Buttons -->
            <div class="hero-nav-buttons">
                <button class="nav-btn-sg active" data-section="packages">FUN WITH FRIENDS</button>
                <button class="nav-btn-sg" data-section="dates">DATE NIGHT</button>
            </div>
        </div>
    </section>

    <!-- Group Packages Section -->
    <section class="packages-section" id="packages-section">
        <div class="section-header-sg">
            <h2 class="section-title-sg">FUN WITH FRIENDS PACKAGES</h2>
            <p class="section-subtitle-sg">1-8 participants • 120 minutes of action</p>
        </div>

        <div class="packages-grid">
            <!-- Package 1 - Axe-Citing Arrow Time -->
            <article class="package-card" data-package="axe-citing-arrow">
                <div class="package-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Axe-Citing Arrow Time">
                </div>
                <div class="package-content">
                    <h3 class="package-title">AXE-CITING ARROW TIME</h3>
                    <p class="package-description">Weapon throwing + archery lesson - the perfect zombie apocalypse prep!</p>

                    <div class="package-details">
                        <div class="detail-item-sg">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Group Size">
                            <span>1-8 people</span>
                        </div>
                        <div class="detail-item-sg">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>120 min</span>
                        </div>
                    </div>

                    <div class="package-includes">
                        <p class="includes-title">INCLUDES:</p>
                        <ul class="includes-list">
                            <li>60min Weapon Throwing</li>
                            <li>60min Archery Lesson</li>
                            <li>All Equipment & Instruction</li>
                            <li>Private Targets</li>
                        </ul>
                    </div>

                    <div class="package-footer">
                        <div class="package-price">
                            <span class="price-label-sg">FROM</span>
                            <span class="price-amount-sg">$49.99</span>
                            <span class="price-label-sg">/PERSON</span>
                        </div>
                        <button class="package-btn">VIEW DETAILS</button>
                    </div>
                </div>
            </article>

            <!-- Package 2 - Hit & Throw Hilarity -->
            <article class="package-card" data-package="hit-throw-hilarity">
                <div class="package-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Hit & Throw Hilarity">
                </div>
                <div class="package-content">
                    <h3 class="package-title">HIT & THROW HILARITY</h3>
                    <p class="package-description">Weapon throwing + rage cage demolition - unleash your wild side!</p>

                    <div class="package-details">
                        <div class="detail-item-sg">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Group Size">
                            <span>1-8 people</span>
                        </div>
                        <div class="detail-item-sg">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>120 min</span>
                        </div>
                    </div>

                    <div class="package-includes">
                        <p class="includes-title">INCLUDES:</p>
                        <ul class="includes-list">
                            <li>60min Weapon Throwing</li>
                            <li>60min Rage Cage Session</li>
                            <li>All Safety Equipment</li>
                            <li>Private Session</li>
                        </ul>
                    </div>

                    <div class="package-footer">
                        <div class="package-price">
                            <span class="price-label-sg">FROM</span>
                            <span class="price-amount-sg">$49.99</span>
                            <span class="price-label-sg">/PERSON</span>
                        </div>
                        <button class="package-btn">VIEW DETAILS</button>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- Date Ideas Section -->
    <section class="dates-section" id="dates-section" style="display: none;">
        <div class="section-header-sg">
            <h2 class="section-title-sg">DATE NIGHT PACKAGES</h2>
            <p class="section-subtitle-sg">2-4 participants • 90 minutes of romance & adrenaline</p>
        </div>

        <div class="dates-grid">
            <!-- Date Package 1 - Bulls-eye Bonanza -->
            <article class="date-card" data-date="bullseye-bonanza">
                <div class="date-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Bulls-eye Bonanza">
                    <div class="date-overlay">
                        <button class="learn-more-btn">LEARN MORE</button>
                    </div>
                </div>
                <div class="date-content">
                    <h3 class="date-title">BULLS-EYE BONANZA</h3>
                    <p class="date-description">Hit the bullseye on date night! Weapon throwing + archery lesson for the perfect romantic adventure.</p>
                    <div class="date-price">
                        <span class="price-from">ONLY</span>
                        <span class="price">$96.69/couple</span>
                    </div>
                </div>
            </article>

            <!-- Date Package 2 - Axe Out & Break Out -->
            <article class="date-card" data-date="axe-break-out">
                <div class="date-image">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Axe Out & Break Out">
                    <div class="date-overlay">
                        <button class="learn-more-btn">LEARN MORE</button>
                    </div>
                </div>
                <div class="date-content">
                    <h3 class="date-title">AXE OUT & BREAK OUT</h3>
                    <p class="date-description">Spice up date night with a bang! Weapon throwing + rage cage for maximum thrills and laughter.</p>
                    <div class="date-price">
                        <span class="price-from">ONLY</span>
                        <span class="price">$96.69/couple</span>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- Bottom Divider -->
    <div class="small-groups-bottom-divider"></div>
</main>

<?php include __DIR__ . '/../components/dashboard-make-reservation.php'; ?>
<?php ViewHelper::loadFooter(); ?>