<?php
// Use absolute path from root
$basePath = '/sdecombats';

$navItems = [
    ['text' => 'FIND AN ACTIVITY', 'href' => $basePath . '/activities'],
    ['text' => 'SMALL GROUPS', 'href' => $basePath . '/small-groups'],
    ['text' => 'BIG GROUPS', 'href' => $basePath . '/big-groups'],
    ['text' => 'BIRTHDAYS', 'href' => $basePath . '/birthdays'],
    ['text' => 'CORPORATE EVENTS', 'href' => '#'],
    ['text' => 'OUTSIDE EVENT', 'href' => $basePath . '/outside-events'],
];

$secondaryItems = [
    ['text' => 'ARCHERY LESSONS & CLUB', 'href' => $basePath . '/archery'],
    ['text' => 'COMPETITIONS', 'href' => '#'],
    ['text' => 'BLOG', 'href' => $basePath . '/blog'],
    ['text' => 'FAQ & CONTACT', 'href' => '#'],
    ['text' => 'GIFT CARDS', 'href' => $basePath . '/gift-cards'],
];
?>
<nav class="mobile-nav" id="mobileNav">
    <div class="mobile-nav-content">
        <div class="mobile-nav-header">
            <a href="<?= $basePath ?>" class="mobile-nav-logo">
                <img src="<?= $basePath ?>/assets/images/placeholders/icon_placeholder.png" alt="Logo">
            </a>

            <div class="mobile-nav-actions">
                <a href="#" class="icon-btn" aria-label="User">
                    <img src="<?= $basePath ?>/assets/images/placeholders/icon_placeholder.png" alt="User" class="icon-img">
                </a>
                <button class="icon-btn" id="menuClose" aria-label="Close">
                    <img src="<?= $basePath ?>/assets/images/placeholders/icon_placeholder.png" alt="Close" class="icon-img">
                </button>
            </div>
        </div>

        <ul class="mobile-nav-list">
            <?php foreach ($navItems as $item): ?>
                <li class="mobile-nav-item">
                    <a href="<?= htmlspecialchars($item['href']) ?>" class="mobile-nav-link">
                        <?= htmlspecialchars($item['text']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'divider.php'; ?>

        <ul class="mobile-nav-list mobile-nav-list-secondary">
            <?php foreach ($secondaryItems as $item): ?>
                <li class="mobile-nav-item">
                    <a href="<?= htmlspecialchars($item['href']) ?>" class="mobile-nav-link">
                        <?= htmlspecialchars($item['text']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'divider.php'; ?>

        <div class="mobile-nav-auth">
            <?php
            $text = 'LOGIN / REGISTER';
            $href = '#';
            $class = 'btn-secondary';
            $size = 'large';
            include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'button.php';
            ?>
        </div>
    </div>
</nav>