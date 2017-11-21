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
        $topLevelNamespace = $container->get('config')->topLevelNamespace;
        $topLevelTestNamespace = $container->get('config')->testNamespace;
        $rootDirectory = $container->get('config')->rootDirectory;

        return new CreateFileService($templateService, $topLevelNamespace, $topLevelTestNamespace, $rootDirectory);
    }
}