<?php

namespace Davework\Factory;

use Davework\Service\CreateFileService;

class CreateFileServiceFactory
{
    public function __invoke()
    {
        $template = require_once __DIR__ . '/../PhpTemplates/Factory.php';
        $namespace = 'Davework\Factory';
        $type = 'factory';
        $fileName = 'TestFactory';

        return new CreateFileService($template, $namespace, $type, $fileName);
    }
}