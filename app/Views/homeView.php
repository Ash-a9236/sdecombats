<?php

use App\Helpers\ViewHelper;

ViewHelper::loadHeader('Home');

// Hero Section
$title = 'AWESOMENESS AWAITS!';
$buttonText = 'RESERVE NOW';
$buttonHref = '#';
$image = '././assets/images/placeholders/base_placeholder.png';
$totalSlides = 6;
$activeSlide = 0;
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'hero-section.php';
?>

<!-- Intro Text -->
<?php
$text = "At Sports de Combats, you are guaranteed an epic time with your friends, impress your dates, friendly competition with colleagues and other Special Occasions!

Or visit us to simply hone your marksmanship abilities!";
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'intro-text.php';
?>

<?php
$text = "Lorem ipsum text [
Premium archery club and services!!!
All ages and styles welcomed!
Bring your own material or borrow ours!
]";
$alignment = 'left';
$image = '././assets/images/placeholders/image_placeholder01.png';
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'text-box.php';
?>

<?php
$text = "Lorem ipsum text [
Premium archery club and services!!!
All ages and styles welcomed!
Bring your own material or borrow ours!
]";
$alignment = 'right';
$image = '././assets/images/placeholders/image_placeholder01.png';
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'text-box.php';
?>

<?php
$text = "Lorem ipsum text [
Premium archery club and services!!!
All ages and styles welcomed!
Bring your own material or borrow ours!
]";
$alignment = 'left';
$image = '././assets/images/placeholders/image_placeholder01.png';
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'text-box.php';
?>

<?php
$text = "Lorem ipsum text [
Premium archery club and services!!!
All ages and styles welcomed!
Bring your own material or borrow ours!
]";
$alignment = 'right';
$image = '././assets/images/placeholders/image_placeholder01.png';
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'text-box.php';
?>

<?php
$text = "Lorem ipsum text [
Premium archery club and services!!!
All ages and styles welcomed!
Bring your own material or borrow ours!
]";
$alignment = 'left';
$image = '././assets/images/placeholders/image_placeholder01.png';
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'text-box.php';
?>

<?php
$text = "Lorem ipsum text [
Premium archery club and services!!!
All ages and styles welcomed!
Bring your own material or borrow ours!
]";
$alignment = 'right';
$image = '././assets/images/placeholders/image_placeholder01.png';
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'text-box.php';
?>

<!-- CTA Button -->
<?php
$text = 'BOOK YOUR NEXT ADVENTURE TODAY!';
$href = '#';
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'cta-section.php';
?>

<?php
$type = 'gradient';
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'divider.php';
?>

<!-- Image Galleries -->
<?php
unset($title, $imageCount, $images);
$title = '';
$imageCount = 4;
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'image-gallery.php';
?>

<?php
unset($title, $imageCount, $images);
$title = 'SEE US ON';
$imageCount = 6;
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'image-gallery.php';
?>

<?php
unset($title, $imageCount, $images);
$title = 'OUR PARTNERS';
$imageCount = 3;
include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'image-gallery.php';
?>

<?php
ViewHelper::loadFooter();
?>