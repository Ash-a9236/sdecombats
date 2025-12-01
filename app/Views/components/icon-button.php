<?php

/**
 * Reusable Icon Button Component
 * @param string $icon - Path to icon image
 * @param string $href - Button link
 * @param string $alt - Alt text for icon
 * @param string $dataAttr - Optional data attribute (e.g., 'data-nav="menu"')
 */
$icon = $icon ?? './././assets/images/placeholders/icon_placeholder.png';
$href = $href ?? '#';
$alt = $alt ?? 'Icon';
$dataAttr = $dataAttr ?? '';
?>
<a href="<?= htmlspecialchars($href) ?>" class="icon-btn" <?= $dataAttr ?> aria-label="<?= htmlspecialchars($alt) ?>">
    <img src="<?= htmlspecialchars($icon) ?>" alt="<?= htmlspecialchars($alt) ?>" class="icon-img">
</a>
