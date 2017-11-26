<?php
require 'vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

// Register middleware
require __DIR__ . '/src/middleware.php';

// Register routes
require __DIR__ . '/src/routes.php';

// Register Config
$configJson = file_get_contents(__DIR__ . '/davework.json');
$config = json_decode($configJson);
$config->rootDirectory = __DIR__ . '/' . $config->rootDirectory;

$container['config'] = $config;