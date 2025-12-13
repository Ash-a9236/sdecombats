<?php
/**
 * Reusable Button Component
 * @param string $text - Button text
 * @param string $href - Button link
 * @param string $class - Additional CSS classes (default: 'btn-primary')
 * @param string $size - Button size: 'small', 'medium', 'large' (default: 'medium')
 */
$text = $text ?? 'Button';
$href = $href ?? '#';
$class = $class ?? 'btn-primary';
$size = $size ?? 'medium';
?>
<a href="<?= htmlspecialchars($href) ?>" class="btn <?= htmlspecialchars($class) ?> btn-<?= htmlspecialchars($size) ?>">
    <?= htmlspecialchars($text) ?>
</a>
