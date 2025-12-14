<?php

use App\Helpers\UserContext;
use App\Helpers\ViewHelper;

ViewHelper ::loadHeader('Home');

$title = $title ?? 'AWESOMENESS AWAITS!';
$image = $image ?? './././assets/images/placeholders/base_placeholder.png';
$totalSlides = $totalSlides ?? 5;
$activeSlide = $activeSlide ?? 0;

$user = UserContext ::getCurrentUser();

?>

<div id="home-wrapper">
    <section class="hero-section">
        <span><?= $title ?></span>
        <div class="hero-image-container">
            <img src="<?= htmlspecialchars($image) ?>" alt="Hero" class="hero-image">
            <div class="carousel-indicators">
                <?php for ($i = 0; $i < $totalSlides; $i++): ?>
                    <button class="carousel-indicator <?= $i === $activeSlide ? 'active' : '' ?>"
                            data-slide="<?= $i ?>"
                            aria-label="Slide <?= $i + 1 ?>">
                    </button>
                <?php endfor; ?>
            </div>
            <a>
                <button type="button" class="base-button">RESERVE NOW</button>
            </a>
        </div>
    </section>

    <section id="main-activities">
        <div class="home-page-main-activities-wrapper">
            <div id="right-column">
                <span class="hexagon-logo-holder"></span>
                <div class="home-page-main-activities-border-shadow">
                    <div class="home-page-main-activities-border">
                        <img src="./assets/images/placeholders/image_placeholder01.png" alt="a fun activity!">
                        <div class="main-activities-text-wrapper">
                            <h2>PREMIER ARCHERY CLUB</h2>
                            <p>Learn archery from scratch, for all ages and all experiences ! <br>From starting to
                                competitions !</p>
                            <span>Lessons & Coaching</span>
                            <span>Practice & Membership</span>
                            <span>Pro Services</span>
                            <a>
                                <button type="button" class="base-button">DISCOVER NOW -></button>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="./assets/images/down-arrow.png" class="down-arrow" alt="down arrow">

                <span class="hexagon-logo-holder"></span>
                <div class="home-page-main-activities-border-shadow">
                    <div class="home-page-main-activities-border">
                        <img src="./assets/images/placeholders/image_placeholder01.png" alt="a fun activity!">
                        <div class="main-activities-text-wrapper">
                            <h2>PREMIER ARCHERY CLUB</h2>
                            <p>Learn archery from scratch, for all ages and all experiences ! <br>From starting to
                                competitions !</p>
                            <span>Lessons & Coaching</span>
                            <span>Practice & Membership</span>
                            <span>Pro Services</span>
                            <a>
                                <button type="button" class="base-button">DISCOVER NOW -></button>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="./assets/images/down-arrow.png" class="down-arrow" alt="down arrow">
            </div>

            <div id="left-column">
                <span class="hexagon-logo-holder"></span>
                <div class="home-page-main-activities-border-shadow">
                    <div class="home-page-main-activities-border">
                        <div class="main-activities-text-wrapper">
                            <h2>PREMIER ARCHERY CLUB</h2>
                            <p>Learn archery from scratch, for all ages and all experiences ! <br>From starting to
                                competitions !</p>
                            <span>Lessons & Coaching</span>
                            <span>Practice & Membership</span>
                            <span>Pro Services</span>
                            <a>
                                <button type="button" class="base-button">DISCOVER NOW -></button>
                            </a>
                        </div>
                        <img src="./assets/images/placeholders/image_placeholder01.png" alt="a fun activity!">
                    </div>
                </div>
                <img src="./assets/images/down-arrow.png" class="down-arrow" alt="down arrow">

               </div>
        </div>
    </section>

    <a>
        <button type="button" class="base-button">BOOK YOUR NEXT ADVENTURE TODAY</button>
    </a>
</div>

<?php

ViewHelper ::loadFooter('Home');
