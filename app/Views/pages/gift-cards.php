<?php

use App\Helpers\UserContext;
use App\Helpers\ViewHelper;

ViewHelper::loadHeader('');

$user = UserContext::getCurrentUser();
?>
<!-- Gift Cards Hero Section -->
<section class="gift-cards-hero">
    <div class="gift-cards-hero-content">
        <p class="gift-cards-hero-subtitle">Online & Onsite Purchase Options Available!</p>
        <h1 class="gift-cards-hero-title">SDC GIFT VOUCHERS:</h1>
        <h2 class="gift-cards-hero-secondary">Your Ticket to Epic Adventures!</h2>
        <p class="gift-cards-hero-tagline">🎄🎁 Give the Gift of Fun This Holiday Season! 🎯🪓</p>
    </div>
</section>

<!-- Activities Carousel -->
<section class="gift-cards-activities">
    <div class="gift-cards-activities-carousel">
        <div class="gift-cards-activity-card">
            <img src="/sdecombats/assets/images/placeholders/image_placeholder01.png" alt="Archery" class="gift-cards-activity-img">
        </div>
        <div class="gift-cards-activity-card">
            <img src="/sdecombats/assets/images/placeholders/image_placeholder01.png" alt="Nerf Battle" class="gift-cards-activity-img">
        </div>
        <div class="gift-cards-activity-card">
            <img src="/sdecombats/assets/images/placeholders/image_placeholder01.png" alt="Combat Archery" class="gift-cards-activity-img">
        </div>
        <div class="gift-cards-activity-card">
            <img src="/sdecombats/assets/images/placeholders/image_placeholder01.png" alt="Weapon Throwing" class="gift-cards-activity-img">
        </div>
        <div class="gift-cards-activity-card">
            <img src="/sdecombats/assets/images/placeholders/image_placeholder01.png" alt="Rage Cage" class="gift-cards-activity-img">
        </div>
    </div>

    <div class="gift-cards-carousel-indicators">
        <span class="indicator active"></span>
        <span class="indicator"></span>
        <span class="indicator"></span>
        <span class="indicator"></span>
        <span class="indicator"></span>
    </div>
</section>

<!-- Description Section -->
<section class="gift-cards-description">
    <div class="gift-cards-description-content">
        <p class="gift-cards-description-text">
            This year, skip the ordinary gifts and go for unforgettable experiences! Our gift cards for axe throwing, archery, the Rage Cage, and more make the perfect present for friends, family, or coworkers. 💥 Whether it's for laughs, thrills, or bonding, it's a gift that truly hits the mark! 🔥🎉
        </p>
        <p class="gift-cards-description-highlight">
            Best of all, our vouchers never expire! 👍👍👍
        </p>
    </div>
</section>

<!-- CTA Section -->
<section class="gift-cards-cta">
    <div class="gift-cards-cta-content">
        <div class="gift-cards-cta-card" data-link="#purchase">
            <img src="/sdecombats/assets/images/placeholders/image_placeholder01.png" alt="Barry's Holiday Gift Guide" class="gift-cards-cta-img">
            <div class="gift-cards-cta-overlay">
                <p class="gift-cards-cta-text">Barry's gift guide! 🎄</p>
            </div>
        </div>

        <div class="gift-cards-cta-card" data-link="#purchase">
            <img src="/sdecombats/assets/images/placeholders/image_placeholder01.png" alt="Physical Gift Card" class="gift-cards-cta-img">
            <div class="gift-cards-cta-overlay">
                <p class="gift-cards-cta-text">Give the gift of fun! 😉</p>
            </div>
        </div>
    </div>
</section>
<div class="divider"></div>
<!-- Benefits Section -->
<section class="gift-cards-benefits">
    <div class="gift-cards-benefits-header">
        <h2 class="gift-cards-benefits-title">🎄🎁 WHY GIFT CARDS AT SDC?</h2>
    </div>

    <div class="gift-cards-benefits-grid">
        <div class="gift-cards-benefit-card">
            <div class="gift-cards-benefit-icon">
                <img src="/sdecombats/assets/images/placeholders/icon_placeholder.png" alt="Unforgettable Experience">
            </div>
            <h3 class="gift-cards-benefit-title">UNFORGETTABLE EXPERIENCE</h3>
            <p class="gift-cards-benefit-text">Way more memorable than socks or candles; they leave with stories, adrenaline, and photos instead of clutter.</p>
        </div>

        <div class="gift-cards-benefit-card">
            <div class="gift-cards-benefit-icon">
                <img src="/sdecombats/assets/images/placeholders/icon_placeholder.png" alt="Gifting Genius">
            </div>
            <h3 class="gift-cards-benefit-title">YOU LOOK LIKE A GIFTING GENIUS</h3>
            <p class="gift-cards-benefit-text">You didn't guess sizes; you gave them a real experience. High-effort energy with low-effort shopping.</p>
        </div>

        <div class="gift-cards-benefit-card">
            <div class="gift-cards-benefit-icon">
                <img src="/sdecombats/assets/images/placeholders/icon_placeholder.png" alt="SDC Community">
            </div>
            <h3 class="gift-cards-benefit-title">PART OF THE SDC COMMUNITY</h3>
            <p class="gift-cards-benefit-text">Once they walk in, they're welcomed like regulars: playful, weird, and absolutely part of the SDC family.</p>
        </div>

        <div class="gift-cards-benefit-card">
            <div class="gift-cards-benefit-icon">
                <img src="/sdecombats/assets/images/placeholders/icon_placeholder.png" alt="Never Expires">
            </div>
            <h3 class="gift-cards-benefit-title">NEVER EXPIRES</h3>
            <p class="gift-cards-benefit-text">No expiry dates, ever. They can book when life calms down or when the urge for chaos hits.</p>
        </div>

        <div class="gift-cards-benefit-card">
            <div class="gift-cards-benefit-icon">
                <img src="/sdecombats/assets/images/placeholders/icon_placeholder.png" alt="All Activities">
            </div>
            <h3 class="gift-cards-benefit-title">GOOD FOR ALL ACTIVITIES</h3>
            <p class="gift-cards-benefit-text">Choose a general SDC voucher or activity-specific one: archery, Rage Cage, weapon throwing, ArcheryTime, and more.</p>
        </div>

        <div class="gift-cards-benefit-card">
            <div class="gift-cards-benefit-icon">
                <img src="/sdecombats/assets/images/placeholders/icon_placeholder.png" alt="Digital or Physical">
            </div>
            <h3 class="gift-cards-benefit-title">DIGITAL OR PHYSICAL CARD</h3>
            <p class="gift-cards-benefit-text">Send it electronically with custom message and photo, or hand over our matte black card in person.</p>
        </div>
    </div>
</section>

<!-- Purchase Section -->
<section class="gift-cards-purchase" id="purchase">
    <div class="gift-cards-purchase-header">
        <h2 class="gift-cards-purchase-title">🎁 PURCHASE GIFT VOUCHER 🎄</h2>
        <p class="gift-cards-purchase-note">Archery lesson packages' gift cards are under GENERIC GIFT VOUCHERS</p>
    </div>

    <div class="gift-cards-purchase-widget">
        <div class="gift-cards-purchase-placeholder">
            <img src="/sdecombats/assets/images/placeholders/icon_placeholder.png" alt="Purchase" class="gift-cards-purchase-icon">
            <p class="gift-cards-purchase-placeholder-text">Booking widget integration placeholder</p>
            <p class="gift-cards-purchase-placeholder-subtext">Connect to your booking system here</p>
        </div>
    </div>

    <div class="gift-cards-redeem">
        <a href="#" class="gift-cards-redeem-link">Redeem Gift Voucher</a>
    </div>
</section>
<div class="divider"></div>
<!-- FAQ Section -->
<section class="gift-cards-faq">
    <div class="gift-cards-faq-header">
        <h2 class="gift-cards-faq-title">❓ FAQ — Quick Answers</h2>
    </div>

    <div class="gift-cards-faq-list">
        <div class="gift-cards-faq-item">
            <button class="gift-cards-faq-question">
                Do SDC gift cards expire?
                <span class="gift-cards-faq-icon">+</span>
            </button>
            <div class="gift-cards-faq-answer">
                <p>No. Our gift cards never expire.</p>
            </div>
        </div>

        <div class="gift-cards-faq-item">
            <button class="gift-cards-faq-question">
                Can I use a general SDC gift card on any activity or service?
                <span class="gift-cards-faq-icon">+</span>
            </button>
            <div class="gift-cards-faq-answer">
                <p>Yes — including archery lessons, Rage Cage, weapon throwing, ArcheryTime, group bookings, and our Archery Proshop.</p>
            </div>
        </div>

        <div class="gift-cards-faq-item">
            <button class="gift-cards-faq-question">
                Are gift cards delivered instantly?
                <span class="gift-cards-faq-icon">+</span>
            </button>
            <div class="gift-cards-faq-answer">
                <p>Digital gift cards are emailed within seconds of purchase.</p>
            </div>
        </div>

        <div class="gift-cards-faq-item">
            <button class="gift-cards-faq-question">
                Can I customize the digital gift card?
                <span class="gift-cards-faq-icon">+</span>
            </button>
            <div class="gift-cards-faq-answer">
                <p>Yes — you can personalize the message, upload your own images, or use one of our pre-selected designs.</p>
            </div>
        </div>

        <div class="gift-cards-faq-item">
            <button class="gift-cards-faq-question">
                Do you offer physical gift cards?
                <span class="gift-cards-faq-icon">+</span>
            </button>
            <div class="gift-cards-faq-answer">
                <p>Yes. Beautiful printed gift cards are available for pickup on-site.</p>
            </div>
        </div>

        <div class="gift-cards-faq-item">
            <button class="gift-cards-faq-question">
                What ages are allowed for activities?
                <span class="gift-cards-faq-icon">+</span>
            </button>
            <div class="gift-cards-faq-answer">
                <p>• Archery lessons: 7+<br>
                    • Weapon Throwing: 10+<br>
                    • ArcheryTime: 10+<br>
                    • Rage Cage: 16+ (with exceptions for 16–17 with guardian)<br>
                    • Nerf: 5+</p>
            </div>
        </div>

        <div class="gift-cards-faq-item">
            <button class="gift-cards-faq-question">
                Where are you located?
                <span class="gift-cards-faq-icon">+</span>
            </button>
            <div class="gift-cards-faq-answer">
                <p>5335 Avenue Casgrain, Montreal, QC</p>
            </div>
        </div>

        <div class="gift-cards-faq-item">
            <button class="gift-cards-faq-question">
                Are these good corporate gifts?
                <span class="gift-cards-faq-icon">+</span>
            </button>
            <div class="gift-cards-faq-answer">
                <p>Absolutely — gift cards and event packages are available for businesses and groups.</p>
            </div>
        </div>
    </div>
</section>
<div class="divider"></div>
<?php
ViewHelper::loadFooter();
?>
