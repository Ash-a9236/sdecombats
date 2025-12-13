<?php
/**
 * Reusable Call-to-Action Section Component
 * @param string $text - CTA button text
 * @param string $href - CTA button link
 */
$text = $text ?? 'BOOK NOW';
$href = $href ?? '#';
?>
<div class="cta-section">
    <?php
    $class = 'btn-primary btn-block';
    $size = 'large';
    include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'button.php';
    ?>
</div>
