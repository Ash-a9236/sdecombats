<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['title'] ?? 'Sports de Combats') ?></title>

    <!--    Wampoon's links-->
    <link rel="stylesheet" href="/sdecombats/assets/css/reset.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/variables.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/mobile.css">

    <link rel="stylesheet" href="/sdecombats/assets/css/00-root.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/01-auth.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/02-home.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/03-all-activities.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/04-archery.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/05-groups.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/06-outside-events.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/07-birthdays.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/08-blog.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/09-dashboard.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/10-components.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/11-header.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/12-footer.css">
    <link rel="stylesheet" href="/sdecombats/assets/css/13-gift-cards.css">

    <!--    Ash_a9236 -> nginx server's links-->
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/variables.css">
    <link rel="stylesheet" href="./assets/css/mobile.css">

    <link rel="stylesheet" href="./assets/css/00-root.css">
    <link rel="stylesheet" href="./assets/css/01-auth.css">
    <link rel="stylesheet" href="./assets/css/02-home.css">
    <link rel="stylesheet" href="./assets/css/03-all-activities.css">
    <link rel="stylesheet" href="./assets/css/04-archery.css">
    <link rel="stylesheet" href="./assets/css/05-groups.css">
    <link rel="stylesheet" href="./assets/css/06-outside-events.css">
    <link rel="stylesheet" href="./assets/css/07-birthdays.css">
    <link rel="stylesheet" href="./assets/css/08-blog.css">
    <link rel="stylesheet" href="./assets/css/09-dashboard.css">
    <link rel="stylesheet" href="./assets/css/10-components.css">
    <link rel="stylesheet" href="./assets/css/11-header.css">
    <link rel="stylesheet" href="./assets/css/12-footer.css">
    <link rel="stylesheet" href="./assets/css/13-gift-cards.css">
</head>

<body>

<?php //include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'mobile-header.php'; ?>
<?php //include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'mobile-nav.php'; ?>

<header>
    <script src="././assets/js/desktop-nav.js" defer></script>
    <nav class="mobile-nav">
        <a href="/menu" class="hamburger-menu">
            <img src="./assets/icons/white/menu.svg" alt="Menu">
        </a>
        <a href="/home" class="mobile-logo">
            <img id="nav-bar-logo" src="./assets/images/placeholders/logo_placeholder.png" alt="Sports De Combats Logo">
        </a>
        <a id="mobile-login-link" href="/login">
            <img class="nav-bar-link-icon" src="./assets/icons/white/user.svg" alt="Login Icon">
        </a>
    </nav>
    <nav class="desktop-nav">
        <div id="nav-bar-first-row">
            <a href="/home">
                <img id="nav-bar-logo" src="./assets/images/website-images/horizontal-logo.png"
                     alt="Sports De Combats Logo">
            </a>
            <ul>
                <li>
                    <a class="nav-bar-link" href="/archery">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/archery.svg">
                        <span class="nav-text">ARCHERY</span>
                    </a>
                </li>
                <li>
                    <a class="nav-bar-link" href="/competitions">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/trophy.svg">
                        <span class="nav-text">COMPETITIONS</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/blog">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/blog.svg">
                        <span class="nav-text">BLOG</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/contact">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/phone.svg">
                        <span class="nav-text">FAQ & CONTACT</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/gift-cards">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/gift-card.svg">
                        <span class="nav-text">GIFT CARDS</span>
                    </a>
                </li>
            </ul>
            <a id="login-link" href="/login">
                <img class="nav-bar-link-icon" src="./assets/icons/white/user.svg" alt="Login Icon">
            </a>
        </div>
        <div id="nav-bar-second-row">
            <ul>
                <li>
                    <a class="nav-bar-link" href="/activities">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/axe.svg">
                        <span class="nav-text">ALL ACTIVITIES</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/date-night">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/bow-heart.svg">
                        <span class="nav-text">DATE NIGHT</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/small-groups">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/small-group.svg">
                        <span class="nav-text">SMALL GROUPS</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/big-groups">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/big-group.svg">
                        <span class="nav-text">BIG GROUPS</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/birthdays">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/birthday.svg">
                        <span class="nav-text">BIRTHDAYS</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/corporate">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/event.svg">
                        <span class="nav-text">CORPORATE EVENTS</span>
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/outside-events">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/map-location-pin.svg">
                        <span class="nav-text">OUTSIDE EVENTS</span>
                    </a>
                </li>
            </ul>
        </div>
        <div id="separator-div"></div>
    </nav>
    <nav class="scrolled-desktop-nav">
        <div id="nav-bar-first-row">
            <a href="/home">
                <img id="nav-bar-logo" src="./assets/images/website-images/small-logo.png""
                alt="Sports De Combats Logo">
            </a>
            <ul>
                <li>
                    <a class="nav-bar-link" href="/archery">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/archery.svg">
                    </a>
                </li>
                <li>
                    <a class="nav-bar-link" href="/competitions">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/trophy.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/blog">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/blog.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/contact">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/phone.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/gift-card">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/gift-card.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/activities">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/axe.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/date-night">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/bow-heart.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/small-groups">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/small-group.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/big-groups">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/big-group.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/birthdays">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/birthday.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/corporate">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/event.svg">
                    </a>
                </li>

                <li>
                    <a class="nav-bar-link" href="/outside-events">
                        <img class="nav-bar-link-icon" src="./assets/icons/white/map-location-pin.svg">
                    </a>
                </li>
            </ul>
            <a id="login-link" href="/login">
                <img class="nav-bar-link-icon" src="./assets/icons/white/user.svg" alt="Login Icon">
            </a>
        </div>
    </nav>
</header>

<body>