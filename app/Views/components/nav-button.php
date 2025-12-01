<?php

/**
 * Navigation Button Component
 * @param string $text - Button text
 * @param string $href - Button link
 * @param string $icon - Icon type ('user', 'menu')
 */
?>
<a href="<?= htmlspecialchars($href ?? '#') ?>"
    class="nav-icon-btn"
    <?php if (($icon ?? '') === 'menu'): ?>data-nav="menu" <?php endif; ?>
    aria-label="<?= htmlspecialchars($text ?? 'Navigation') ?>">