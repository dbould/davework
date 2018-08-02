<?php
// DIC configuration

use Dbould\Davework\Factory\CreateFileServiceFactory;
//use Dbould\Davework\Factory\CreateSlimProjectServiceFactory;
use Dbould\Davework\Factory\FileSpecTypeServiceFactory;
use Dbould\Davework\Factory\TemplateServiceFactory;
use Dbould\Davework\Service\CreateFileService;
//use Dbould\Davework\Service\CreateSlimProjectService;
use Dbould\Davework\Service\FileSpecTypeService;
use Dbould\Davework\Service\TemplateService;

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
