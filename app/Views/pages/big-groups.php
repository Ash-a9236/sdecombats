<?php

use App\Helpers\UserContext;
use App\Helpers\ViewHelper;

ViewHelper::loadHeader('');

$user = UserContext::getCurrentUser();

?>

<!-- Big Groups Page -->
<main class="big-groups-page">
    <!-- Hero Section -->
    <section class="big-groups-hero">
        <div class="hero-content-bg">
            <h1 class="hero-title-bg">LARGE GROUP EVENTS</h1>
            <p class="hero-subtitle-bg">Epic celebrations & team building for 6+ participants</p>

            <!-- Quick Nav Buttons -->
            <div class="hero-nav-buttons-bg">
                <button class="nav-btn-bg active" data-section="youth">KIDS & TEENS</button>
                <button class="nav-btn-bg" data-section="adults">ADULTS & CORPORATE</button>
            </div>
        </div>
    </section>
    <div class="small-groups-bottom-divider"></div>

    <!-- Youth Packages Section (Kids & Teens) -->
    <section class="packages-section-bg" id="youth-section">
        <div class="section-header-bg">
            <h2 class="section-title-bg">KIDS & TEENS BIRTHDAY PARTIES</h2>
            <p class="section-subtitle-bg">The most memorable celebrations in Montreal</p>
        </div>

        <div class="packages-grid-bg">
            <!-- Kids Birthday Package -->
            <article class="package-card-bg" data-package="kids-birthday">
                <div class="package-image-bg">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Kids Birthday Party">
                </div>
                <div class="package-content-bg">
                    <h3 class="package-title-bg">KIDS NERF PARTY</h3>
                    <p class="package-description-bg">The ultimate Nerf birthday experience with 200+ blasters, party room, and game masters!</p>

                    <div class="package-details-bg">
                        <div class="detail-item-bg">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Age">
                            <span>Ages 6+</span>
                        </div>
                        <div class="detail-item-bg">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>2 hours</span>
                        </div>
                    </div>

                    <div class="package-includes-bg">
                        <p class="includes-title-bg">INCLUDES:</p>
                        <ul class="includes-list-bg">
                            <li>30min Training + 60min Battle</li>
                            <li>50min Party Room</li>
                            <li>200+ Nerf Blasters</li>
                            <li>Birthday Child FREE</li>
                        </ul>
                    </div>

                    <div class="package-footer-bg">
                        <div class="package-price-bg">
                            <span class="price-label-bg">FROM</span>
                            <span class="price-amount-bg">$209.99</span>
                        </div>
                        <button class="package-btn-bg">VIEW DETAILS</button>
                    </div>
                </div>
            </article>

            <!-- Teens Birthday Package -->
            <article class="package-card-bg" data-package="teens-birthday">
                <div class="package-image-bg">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Teens Birthday Party">
                </div>
                <div class="package-content-bg">
                    <h3 class="package-title-bg">TEENS ADVENTURE PARTY</h3>
                    <p class="package-description-bg">Epic multi-activity packages with weapon throwing, archery, combat archery & Nerf!</p>

                    <div class="package-details-bg">
                        <div class="detail-item-bg">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Age">
                            <span>Ages 12+</span>
                        </div>
                        <div class="detail-item-bg">
                            <img src="/sdecombats/public/assets/icons/white/calendar.svg" alt="Duration">
                            <span>2 hours</span>
                        </div>
                    </div>

                    <div class="package-includes-bg">
                        <p class="includes-title-bg">INCLUDES:</p>
                        <ul class="includes-list-bg">
                            <li>1-2 Activity Choices</li>
                            <li>Party Room or Eating Space</li>
                            <li>Professional Instruction</li>
                            <li>Birthday Teen FREE</li>
                        </ul>
                    </div>

                    <div class="package-footer-bg">
                        <div class="package-price-bg">
                            <span class="price-label-bg">FROM</span>
                            <span class="price-amount-bg">$239.99</span>
                        </div>
                        <button class="package-btn-bg">VIEW DETAILS</button>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- Adults Packages Section -->
    <section class="packages-section-bg" id="adults-section" style="display: none;">
        <div class="section-header-bg">
            <h2 class="section-title-bg">ADULTS & CORPORATE EVENTS</h2>
            <p class="section-subtitle-bg">Custom experiences for special occasions & team building</p>
        </div>

        <div class="packages-grid-bg">
            <!-- Special Occasions Package -->
            <article class="package-card-bg" data-package="special-occasions">
                <div class="package-image-bg">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Special Occasions">
                </div>
                <div class="package-content-bg">
                    <h3 class="package-title-bg">SPECIAL OCCASIONS</h3>
                    <p class="package-description-bg">Bachelor/bachelorette parties, birthdays, & celebrations with custom activity combinations!</p>

                    <div class="package-details-bg">
                        <div class="detail-item-bg">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Age">
                            <span>Ages 18+</span>
                        </div>
                        <div class="detail-item-bg">
                            <img src="/sdecombats/public/assets/icons/white/big-group.svg" alt="Group">
                            <span>9+ people</span>
                        </div>
                    </div>

                    <div class="package-includes-bg">
                        <p class="includes-title-bg">AVAILABLE:</p>
                        <ul class="includes-list-bg">
                            <li>Rage Cage Demolition</li>
                            <li>Weapon Throwing</li>
                            <li>Archery & Combat Archery</li>
                            <li>Beer & Wine Welcome</li>
                        </ul>
                    </div>

                    <div class="package-footer-bg">
                        <div class="package-price-bg">
                            <span class="price-label-bg">CUSTOM</span>
                            <span class="price-amount-bg">QUOTE</span>
                        </div>
                        <button class="package-btn-bg">VIEW DETAILS</button>
                    </div>
                </div>
            </article>

            <!-- Corporate Events Package -->
            <article class="package-card-bg" data-package="corporate-events">
                <div class="package-image-bg">
                    <img src="/sdecombats/public/assets/images/placeholders/image_placeholder01.png" alt="Corporate Events">
                </div>
                <div class="package-content-bg">
                    <h3 class="package-title-bg">CORPORATE TEAM BUILDING</h3>
                    <p class="package-description-bg">Professional team building events with catering, conference space & transportation options!</p>

                    <div class="package-details-bg">
                        <div class="detail-item-bg">
                            <img src="/sdecombats/public/assets/icons/white/user.svg" alt="Age">
                            <span>Ages 18+</span>
                        </div>
                        <div class="detail-item-bg">
                            <img src="/sdecombats/public/assets/icons/white/big-group.svg" alt="Group">
                            <span>6-100 people</span>
                        </div>
                    </div>

                    <div class="package-includes-bg">
                        <p class="includes-title-bg">SERVICES:</p>
                        <ul class="includes-list-bg">
                            <li>10,000 sq ft Facility</li>
                            <li>Conference Space</li>
                            <li>Catering Options</li>
                            <li>Transportation Available</li>
                        </ul>
                    </div>

                    <div class="package-footer-bg">
                        <div class="package-price-bg">
                            <span class="price-label-bg">CUSTOM</span>
                            <span class="price-amount-bg">QUOTE</span>
                        </div>
                        <button class="package-btn-bg">VIEW DETAILS</button>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <div class="small-groups-bottom-divider"></div>
</main>

<?php include __DIR__ . '/../components/dashboard-make-reservation.php'; ?>
<?php ViewHelper::loadFooter(); ?>