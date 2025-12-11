<!-- Activity Popup Component -->
<div class="activity-popup" id="activityPopup">
    <div class="activity-popup__overlay"></div>

    <div class="activity-popup__container">
        <button class="activity-popup__close" onclick="closeActivityPopup()">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 5L5 15M5 5L15 15" stroke="white" stroke-width="2.5" stroke-linecap="round" />
            </svg>
        </button>

        <div class="activity-popup__content">
            <!-- top section -->
            <div class="top-section">
                <!-- Right Side Content -->
                <div class="activity-popup__info">
                    <!-- Header -->
                    <div class="activity-popup__header">
                        <h2 class="activity-popup__title">LOREM IPSUM TITLE</h2>
                    </div>
                    <!-- Image -->
                    <div class="activity-popup__image-container">
                        <img
                            src="././assets/images/placeholders/image_placeholder01.png"
                            alt="Activity"
                            class="activity-popup__image">
                    </div>
                    <!-- Description -->
                    <p class="activity-popup__description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat...
                    </p>
                </div>
            </div>
            <div class="activity-popup__bottom">
                <!-- Offers -->
                <div class="activity-popup__offers">
                    <button class="activity-popup__offer-btn">
                        <span class="activity-popup__offer-polygon--top-right"></span>
                        <span class="activity-popup__offer-polygon--bottom-left"></span>
                    </button>
                    <button class="activity-popup__offer-btn">
                        <span class="activity-popup__offer-polygon--top-right"></span>
                        <span class="activity-popup__offer-polygon--bottom-left"></span>
                    </button>
                    <button class="activity-popup__offer-btn">
                        <span class="activity-popup__offer-polygon--top-right"></span>
                        <span class="activity-popup__offer-polygon--bottom-left"></span>
                    </button>
                    <button class="activity-popup__offer-btn">
                        <span class="activity-popup__offer-polygon--top-right"></span>
                        <span class="activity-popup__offer-polygon--bottom-left"></span>
                    </button>
                    <button class="activity-popup__offer-btn">
                        <span class="activity-popup__offer-polygon--top-right"></span>
                        <span class="activity-popup__offer-polygon--bottom-left"></span>
                    </button>
                </div>

                <!-- Button -->
                <a href="#"><button class="base-button" type="button">RESERVE NOW</button></a>
            </div>
        </div>
    </div>
</div>