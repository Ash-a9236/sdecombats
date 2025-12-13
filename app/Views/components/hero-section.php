<?php

/**
 * Reusable Hero Section Component
 * @param string $title - Hero title
 * @param string $buttonText - CTA button text
 * @param string $buttonHref - CTA button link
 * @param string $image - Hero image path
 * @param int $totalSlides - Total carousel slides
 * @param int $activeSlide - Active slide index
 */
$title = $title ?? 'AWESOMENESS AWAITS!';
$buttonText = $buttonText ?? 'RESERVE NOW';
$buttonHref = $buttonHref ?? '#';
$image = $image ?? './././assets/images/placeholders/base_placeholder.png';
$totalSlides = $totalSlides ?? 5;
$activeSlide = $activeSlide ?? 0;
?>
<section class="hero-section">
    <div class="hero-image-container">
        <img src="<?= htmlspecialchars($image) ?>" alt="Hero" class="hero-image">
        <div class="hero-overlay"></div>

        <?php
        $total = $totalSlides;
        $active = $activeSlide;
        include __DIR__ . DIRECTORY_SEPARATOR . 'carousel-indicators.php';
        ?>
    </div>

    <div class="hero-content">
        <h1 class="hero-title"><?= htmlspecialchars($title) ?></h1>
        <?php
        $text = $buttonText;
        $href = $buttonHref;
        $class = 'btn-primary';
        $size = 'large';
        include __DIR__ . DIRECTORY_SEPARATOR . 'button.php';
        ?>
    </div>
</section>
