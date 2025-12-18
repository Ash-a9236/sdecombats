<?php

declare(strict_types=1);

//TODO: set the app environment based on the domaine name.
// The APP_ENV value must be set to either prod or dev
$_ENV['APP_ENV'] = 'dev';
// $_ENV['APP_ENV'] ??= $_SERVER['APP_ENV'] ?? 'dev';
$app_environment = $_ENV['APP_ENV'];

// Load default settings
$settings = require __DIR__ . '/defaults.php';

// Overwrite default settings with environment specific local settings
// Override default settings with environment specific local settings.
// Override default settings with environment specific local settings.
$config_files = [
    __DIR__ . sprintf('/settings.%s.php', $app_environment),
    __DIR__ . '/env.php',
    __DIR__ . '/../../env.php',
];

foreach ($config_files as $config_file) {
    if (!file_exists($config_file)) {
        continue;
    }

    $local_settings = require $config_file;
    if (is_callable($local_settings)) {
        $settings = $local_settings($settings);
    }
}

return $settings;
