<?php
$navItems = [
    ['text' => 'FIND AN ACTIVITY', 'href' => '#'],
    ['text' => 'SMALL GROUPS', 'href' => '#'],
    ['text' => 'BIG GROUPS', 'href' => '#'],
    ['text' => 'BIRTHDAYS', 'href' => '#'],
    ['text' => 'CORPORATE EVENTS', 'href' => '#'],
    ['text' => 'OUTSIDE EVENT', 'href' => '#'],
];

$secondaryItems = [
    ['text' => 'ARCHERY LESSONS & CLUB', 'href' => '#'],
    ['text' => 'COMPETITIONS', 'href' => '#'],
    ['text' => 'BLOG', 'href' => '#'],
    ['text' => 'FAQ & CONTACT', 'href' => '#'],
    ['text' => 'GIFT CARDS', 'href' => '#'],
];
?>
<nav class="mobile-nav" id="mobileNav">
    <div class="mobile-nav-content">
        <div class="mobile-nav-header">
            <a href="/sdecombats-main/" class="mobile-nav-logo">
                <img src="./././assets/images/placeholders/icon_placeholder.png" alt="Logo">
            </a>

            <div class="mobile-nav-actions">
                <a href="#" class="icon-btn" aria-label="User">
                    <img src="./././assets/images/placeholders/icon_placeholder.png" alt="User" class="icon-img">
                </a>
                <button class="icon-btn" id="menuClose" aria-label="Close">
                    <img src="./././assets/images/placeholders/icon_placeholder.png" alt="Close" class="icon-img">
                </button>
            </div>
        </div>

        <ul class="nav-list">
            <?php foreach ($navItems as $item): ?>
                <?php
                $text = $item['text'];
                $href = $item['href'];
                include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'nav-item.php';
                ?>
            <?php endforeach; ?>
        </ul>

        <?php include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'divider.php'; ?>

        <ul class="nav-list nav-list-secondary">
            <?php foreach ($secondaryItems as $item): ?>
                <?php
                $text = $item['text'];
                $href = $item['href'];
                include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'nav-item.php';
                ?>
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