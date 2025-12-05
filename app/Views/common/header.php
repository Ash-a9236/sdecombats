<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title ?? 'Sports de Combats') ?></title>
    <link rel="stylesheet" href="././assets/css/reset.css">
    <link rel="stylesheet" href="././assets/css/variables.css">
    <link rel="stylesheet" href="././assets/css/mobile.css">

    <link rel="stylesheet" href="././assets/css/00-root.css">
    <link rel="stylesheet" href="././assets/css/01-auth.css">
    <link rel="stylesheet" href="././assets/css/02-home.css">
    <link rel="stylesheet" href="././assets/css/03-all-activities.css">
    <link rel="stylesheet" href="././assets/css/04-archery.css">
    <link rel="stylesheet" href="././assets/css/05-groups.css">
    <link rel="stylesheet" href="././assets/css/06-outside-events.css">
    <link rel="stylesheet" href="././assets/css/07-birthdays.css">
    <link rel="stylesheet" href="././assets/css/08-blog.css">
    <link rel="stylesheet" href="././assets/css/09-dashboard.css">
    <link rel="stylesheet" href="././assets/css/10-components.css">
    <link rel="stylesheet" href="././assets/css/11-header.css">
    <link rel="stylesheet" href="././assets/css/12-footer.css">
</head>

<body>
<?php include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'mobile-header.php'; ?>
<?php include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'mobile-nav.php'; ?>

<main class="main-content"></main>
