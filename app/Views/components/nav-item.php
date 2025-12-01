<?php
/**
 * Reusable Navigation Item Component
 * @param string $text - Nav item text
 * @param string $href - Nav item link
 */
$text = $text ?? 'Nav Item';
$href = $href ?? '#';
?>
<li class="nav-item">
    <a href="<?= htmlspecialchars($href) ?>" class="nav-link">
        <?= htmlspecialchars($text) ?>
    </a>
</li>
