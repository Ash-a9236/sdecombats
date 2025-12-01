<?php

/**
 * Reusable Image Gallery Component
 * @param string $title - Gallery section title
 * @param int $imageCount - Number of images to display
 * @param string $images - Array of image paths (optional, uses placeholder if not provided)
 */
$title = $title ?? '';
$imageCount = $imageCount ?? 4;
$images = $images ?? array_fill(0, $imageCount, './././assets/images/placeholders/image_placeholder01.png');
?>
<div class="image-gallery-section">
    <h2 class="gallery-title"><?= htmlspecialchars($title) ?></h2>
    <div class="image-gallery-container">
        <div class="image-gallery-scroll">
            <?php foreach ($images as $index => $image): ?>
                <div class="gallery-image-wrapper">
                    <img src="<?= htmlspecialchars($image) ?>"
                        alt="Gallery image <?= $index + 1 ?>"
                        class="gallery-image">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    $type = 'gradient';
    include __DIR__ . DIRECTORY_SEPARATOR . 'divider.php';
    ?>
</div>
