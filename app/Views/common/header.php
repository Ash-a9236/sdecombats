<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title ?? 'Sports de Combats') ?></title>
    <link rel="stylesheet" href="././assets/css/reset.css">
    <link rel="stylesheet" href="././assets/css/variables.css">
    <link rel="stylesheet" href="././assets/css/components.css">
    <link rel="stylesheet" href="././assets/css/mobile.css">
</head>

<body>
    <?php include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'mobile-header.php'; ?>
    <?php include APP_VIEWS_PATH . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'mobile-nav.php'; ?>

    <main class="main-content"></main>
