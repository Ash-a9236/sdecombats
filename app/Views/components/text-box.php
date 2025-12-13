<?php

/**
 * Reusable Text Box Component with hexagon decoration and image
 * @param string $text - Main text content
 * @param string $alignment - 'left' or 'right'
 * @param string $image - Image placeholder path
 */
$text = $text ?? 'Lorem ipsum text';
$alignment = $alignment ?? 'left';
$image = $image ?? './././assets/images/placeholders/image_placeholder01.png';
?>
<div class="text-box text-box-<?= htmlspecialchars($alignment) ?>">
    <div class="text-box-hexagon"></div>
    <div class="text-box-border">
        <div class="text-box-inner">
            <div class="text-box-image-container">
                <img src="<?= htmlspecialchars($image) ?>" alt="Icon" class="text-box-image">
            </div>
            <div class="text-box-content">
                <p><?= nl2br(htmlspecialchars($text)) ?></p>
            </div>
        </div>
    </div>
    <div class="text-box-arrows-container">
        <img src="./././assets/images/down-arrow.png" alt="" class="text-box-arrow-img">
    </div>
</div>
