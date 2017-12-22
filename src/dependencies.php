<?php
// DIC configuration

use Davework\Factory\CreateFileServiceFactory;
use Davework\Factory\CreateSlimProjectServiceFactory;
use Davework\Factory\FileSpecTypeServiceFactory;
use Davework\Factory\TemplateServiceFactory;
use Davework\Service\CreateFileService;
use Davework\Service\CreateSlimProjectService;
use Davework\Service\FileSpecTypeService;
use Davework\Service\TemplateService;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container[CreateFileService::class] = new CreateFileServiceFactory($container);
$container[TemplateService::class] = new TemplateServiceFactory($container);
$container[FileSpecTypeService::class] = new FileSpecTypeServiceFactory($container);
