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
if (file_exists('davework.json')) {
    $configJson = file_get_contents('davework.json');
} else {
    die("Couldn't find davework.json\n");
}

$projectRoot = pathinfo(realpath('davework.json'), PATHINFO_DIRNAME);
$config = json_decode($configJson);
$config->rootDirectory = $projectRoot . '/' . $config->rootDirectory;
$config->testsDirectory = $projectRoot . '/' . $config->testsDirectory;

if (isset($config->newProjectDirectory)) {
    $newProjectDirectory = $config->newProjectDirectory;
} else {
    $newProjectDirectory = $config->rootDirectory;
}

$config->newProjectDirectory = $projectRoot . '/' . $newProjectDirectory;

$container['config'] = $config;
