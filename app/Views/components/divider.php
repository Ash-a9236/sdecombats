<?php
/**
 * Reusable Divider Component
 * @param string $type - 'gradient' or 'solid'
 */
$type = $type ?? 'gradient';
?>
<div class="divider divider-<?= htmlspecialchars($type) ?>"></div>
