<?php
/**
 * Reusable Carousel Indicators Component
 * @param int $total - Total number of slides
 * @param int $active - Active slide index (0-based)
 */
$total = $total ?? 5;
$active = $active ?? 0;
?>
<div class="carousel-indicators">
    <?php for ($i = 0; $i < $total; $i++): ?>
        <button class="carousel-indicator <?= $i === $active ? 'active' : '' ?>"
                data-slide="<?= $i ?>"
                aria-label="Slide <?= $i + 1 ?>">
        </button>
    <?php endfor; ?>
</div>
