<?php

namespace Davework\Factory;

use Davework\Service\CreateFileService;
use Davework\Service\TemplateService;
use Psr\Container\ContainerInterface;

class CreateFileServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $templateService = $container->get(TemplateService::class);
        $namespace = 'Davework\Factory';

        return new CreateFileService($templateService, $namespace);
    }
}