<?php

use App\Helpers\UserContext;
use App\Helpers\ViewHelper;

ViewHelper::loadHeader('');

$user = UserContext::getCurrentUser();

?>

<!-- Contact Page -->
<main class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="hero-content-contact">
            <h1 class="hero-title-contact">GET IN TOUCH</h1>
            <p class="hero-subtitle-contact">We're here to help plan your next adventure</p>
        </div>
    </section>

    <!-- Quick Nav -->
    <section class="quick-nav-section">
        <div class="quick-nav-container">
            <a href="#location" class="quick-nav-btn">
                <img src="/assets/icons/white/map-location-pin.svg" alt="Location">
                <span>Location</span>
            </a>
            <a href="#street-parking" class="quick-nav-btn">
                <img src="/assets/icons/white/info.svg" alt="Street Parking">
                <span>Street Parking</span>
            </a>
            <a href="#underground-parking" class="quick-nav-btn">
                <img src="/assets/icons/white/info.svg" alt="Underground">
                <span>Underground</span>
            </a>
            <a href="#transit" class="quick-nav-btn">
                <img src="/assets/icons/white/info.svg" alt="Transit">
                <span>Transit</span>
            </a>
            <a href="#contact-form" class="quick-nav-btn">
                <img src="/assets/icons/white/phone.svg" alt="Contact">
                <span>Contact</span>
            </a>
        </div>
    </section>

    <!-- Location Section -->
    <section class="location-section" id="location">
        <div class="section-container">
            <h2 class="section-title-contact">OUR LOCATION</h2>

            <div class="location-grid">
                <!-- Address Card -->
                <div class="info-card-contact">
                    <div class="card-icon">
                        <img src="/assets/icons/white/map-location-pin.svg" alt="Address">
                    </div>
                    <h3>ADDRESS</h3>
                    <p>5335 Ave Casgrain<br>Montreal, Quebec<br>Canada, H2T 1X4</p>
                </div>

                <!-- Phone Card -->
                <div class="info-card-contact">
                    <div class="card-icon">
                        <img src="/assets/icons/white/phone.svg" alt="Phone">
                    </div>
                    <h3>PHONE</h3>
                    <p>Toll Free: +1 855-204-2017<br>Local: +1 514-613-3894</p>
                </div>

                <!-- Email Card -->
                <div class="info-card-contact">
                    <div class="card-icon">
                        <img src="/assets/icons/white/phone.svg" alt="Email">
                    </div>
                    <h3>EMAIL</h3>
                    <p><a href="mailto:info@sportsdecombats.com">info@sportsdecombats.com</a></p>
                </div>

                <!-- Hours Card -->
                <div class="info-card-contact">
                    <div class="card-icon">
                        <img src="/assets/icons/white/calendar.svg" alt="Hours">
                    </div>
                    <h3>HOURS</h3>
                    <p>
                        Mon: 1:00pm-8:00pm<br>
                        Tue-Fri: 1:00pm-9:00pm<br>
                        Sat: 11:00am-9:00pm<br>
                        Sun: 11:00am-8:00pm
                    </p>
                </div>
            </div>

            <!-- Map Placeholder -->
            <div class="map-container">
                <img src="/assets/images/placeholders/image_placeholder01.png" alt="Map">
                <div class="map-overlay">
                    <p>Interactive Map Coming Soon</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Street Parking Section -->
    <section class="parking-section" id="street-parking">
        <div class="section-container">
            <h2 class="section-title-contact">PUBLIC STREET PARKING</h2>

            <div class="parking-info">
                <div class="parking-notice">
                    <img src="/assets/icons/white/info.svg" alt="Notice">
                    <p><strong>Please pay attention to permit-only parking signs.</strong> Usually the easiest way is to see if there is a pay parking pole next to your spot.</p>
                </div>

                <div class="parking-grid">
                    <div class="parking-column">
                        <h3>AVAILABLE STREETS:</h3>
                        <ul class="street-list">
                            <li>Casgrain Avenue</li>
                            <li>Rue St Dominique</li>
                            <li>Rue St Viateur</li>
                            <li>Rue Bernard</li>
                            <li>Rue McGuire</li>
                            <li>Boul St Laurent</li>
                        </ul>
                    </div>

                    <div class="parking-column">
                        <h3>PUBLIC LOT:</h3>
                        <div class="lot-info">
                            <img src="/assets/icons/white/info.svg" alt="Lot">
                            <p>5623 Ave Casgrain<br><span class="parking-note">(Availability not guaranteed)</span></p>
                        </div>
                    </div>
                </div>

                <!-- Parking Map -->
                <div class="parking-map">
                    <img src="/assets/images/placeholders/image_placeholder01.png" alt="Parking Map">
                </div>
            </div>
        </div>
    </section>

    <!-- Underground Parking Section -->
    <section class="underground-section" id="underground-parking">
        <div class="section-container">
            <h2 class="section-title-contact">UNDERGROUND PARKING</h2>

            <div class="underground-notice">
                <img src="/assets/icons/white/info.svg" alt="Important">
                <div>
                    <h3>IMPORTANT INFORMATION</h3>
                    <ul>
                        <li><strong>Limited availability</strong> — advance reservation strongly recommended</li>
                        <li><strong>One pass per vehicle</strong> (a 2nd car will get stuck; $50 release fee applies)</li>
                        <li>Parking time must cover arrival, check-in, activity & exit (add 15-30 min for check-in/gear-up)</li>
                        <li>Pick-up time should be at least 15 minutes before your activity starts</li>
                        <li><strong>Lost/damaged pass:</strong> $50 replacement fee</li>
                        <li><strong>No refunds</strong> for cancellations less than 24h in advance</li>
                        <li>If unsure, choose the next longest option (overstays = $1/min surcharge)</li>
                    </ul>
                </div>
            </div>

            <div class="underground-availability">
                <p><strong>Online booking:</strong> Mon–Fri, 12:00 PM – 9:00 PM</p>
                <p><strong>Weekend or pre-12 PM bookings:</strong> <a href="#contact-form">Contact us</a> to request availability</p>
            </div>

            <div class="parking-packages">
                <div class="parking-package">
                    <div class="package-duration">1.5 HOURS</div>
                    <div class="package-price">$5.99</div>
                    <button class="package-book-btn" data-url="https://bookeo.com/sportsdecombats?type=41560FRC4XM180A514EFCA">RESERVE NOW</button>
                </div>

                <div class="parking-package featured">
                    <div class="package-duration">2.5 HOURS</div>
                    <div class="package-price">$9.99</div>
                    <button class="package-book-btn" data-url="https://bookeo.com/sportsdecombats?type=41560FRC4XM180A514EFCA">RESERVE NOW</button>
                </div>

                <div class="parking-package">
                    <div class="package-duration">3 HOURS</div>
                    <div class="package-price">$11.99</div>
                    <button class="package-book-btn" data-url="https://bookeo.com/sportsdecombats?type=41560FRC4XM180A514EFCA">RESERVE NOW</button>
                </div>

                <div class="parking-package">
                    <div class="package-duration">4 HOURS</div>
                    <div class="package-price">$13.99</div>
                    <button class="package-book-btn" data-url="https://bookeo.com/sportsdecombats?type=41560FRC4XM180A514EFCA">RESERVE NOW</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Public Transit Section -->
    <section class="transit-section" id="transit">
        <div class="section-container">
            <h2 class="section-title-contact">BY PUBLIC TRANSIT</h2>

            <div class="transit-grid">
                <!-- Metro -->
                <div class="transit-card">
                    <div class="transit-icon">
                        <img src="/assets/icons/white/info.svg" alt="Metro">
                    </div>
                    <h3>VIA SUBWAY</h3>
                    <ol class="transit-steps">
                        <li>Take the subway to <strong>Laurier metro station</strong></li>
                        <li>Take the <strong>Ave Laurier Est</strong> exit</li>
                        <li>Walk 4 minutes west on Ave Laurier to Ave Casgrain</li>
                        <li>Walk 2 minutes north on Ave Casgrain</li>
                        <li>Our facility will be on your right</li>
                    </ol>
                </div>

                <!-- Bus South -->
                <div class="transit-card">
                    <div class="transit-icon">
                        <img src="/assets/icons/white/info.svg" alt="Bus">
                    </div>
                    <h3>VIA BUS 55 OR 363 SOUTH</h3>
                    <ol class="transit-steps">
                        <li>Get off at <strong>Saint-Laurent/Rue Maguire</strong></li>
                        <li>Walk 2 blocks on Rue Maguire to Ave Casgrain</li>
                        <li>Turn left (north) and walk 2 minutes north on Ave Casgrain</li>
                        <li>Our facility will be on your right</li>
                    </ol>
                </div>

                <!-- Bus North -->
                <div class="transit-card">
                    <div class="transit-icon">
                        <img src="/assets/icons/white/info.svg" alt="Bus">
                    </div>
                    <h3>VIA BUS 55 OR 363 NORTH</h3>
                    <ol class="transit-steps">
                        <li>Get off at <strong>Saint-Laurent/Ave Fairmount Ouest</strong></li>
                        <li>Walk 2 minutes east on Ave Fairmount</li>
                        <li>Turn left (north) and walk 2 minutes north on Ave Casgrain</li>
                        <li>Our facility will be on your right</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section" id="contact-form">
        <div class="section-container">
            <h2 class="section-title-contact">QUESTIONS?</h2>
            <p class="form-intro">Email us at <a href="mailto:info@sportsdecombats.com">info@sportsdecombats.com</a> or use the form below. If you don't receive our response in 24 hours, please check your spam folder.</p>

            <form class="contact-form" id="contactForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="confirm-email">Confirm Email Address *</label>
                        <input type="email" id="confirm-email" name="confirm-email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="activities">Interested Activities *</label>
                        <select id="activities" name="activities" required>
                            <option value="">Select Activity</option>
                            <option value="archery">Archery</option>
                            <option value="nerf">Nerf Battle</option>
                            <option value="rage-cage">Rage Cage</option>
                            <option value="axe-throwing">Axe / Knife Throwing</option>
                            <option value="combat-archery">Combat Archery</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inquiry-type">Type of Inquiry *</label>
                        <select id="inquiry-type" name="inquiry-type" required>
                            <option value="">Select Type</option>
                            <option value="general">General Inquiry</option>
                            <option value="parking">Weekend Parking Request</option>
                            <option value="archery-equipment">Archery Lesson/Range/Equipment</option>
                            <option value="kids-teens">Kids/Teens' Birthday Party</option>
                            <option value="corporate">Corporate Event & Special Occasions</option>
                            <option value="small-group">Small Group & Date Night Packages</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="date">Interested Date</label>
                        <input type="date" id="date" name="date">
                    </div>

                    <div class="form-group">
                        <label for="time">Interested Time</label>
                        <select id="time" name="time">
                            <option value="">Select Time</option>
                            <option value="10am">10 AM</option>
                            <option value="11am">11 AM</option>
                            <option value="12pm">12 PM</option>
                            <option value="1pm">1 PM</option>
                            <option value="2pm">2 PM</option>
                            <option value="3pm">3 PM</option>
                            <option value="4pm">4 PM</option>
                            <option value="5pm">5 PM</option>
                            <option value="6pm">6 PM</option>
                            <option value="7pm">7 PM</option>
                            <option value="8pm">8 PM</option>
                            <option value="9pm">9 PM</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="players">Estimate Number of Players</label>
                        <input type="number" id="players" name="players" min="1">
                    </div>

                    <div class="form-group">
                        <label for="referral">How did you hear about us?</label>
                        <select id="referral" name="referral">
                            <option value="">Select Option</option>
                            <option value="google-search">Google Search</option>
                            <option value="google-ad">Google Ad</option>
                            <option value="social-ad">Facebook/Instagram Ad</option>
                            <option value="friend">From a Friend</option>
                            <option value="flyer">I saw a flyer</option>
                            <option value="store">I saw your store</option>
                            <option value="telepathy">I just know telepathically</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="message">Message/Note</label>
                    <textarea id="message" name="message" rows="5"></textarea>
                </div>

                <button type="submit" class="submit-btn">SEND MESSAGE</button>
            </form>
        </div>
    </section>

    <!-- Bottom Divider -->
    <div class="contact-bottom-divider"></div>
</main>


<?php ViewHelper::loadFooter(); ?>