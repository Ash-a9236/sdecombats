<?php
/**
 * Reusable Intro Text Component
 * @param string $text - Intro text content
 */
$text = $text ?? 'Intro text here';
?>
<div class="intro-text">
    <p><?= nl2br(htmlspecialchars($text)) ?></p>
</div>
