<?php

namespace Davework\Factory;

use Davework\Service\CreateFileService;
use Davework\Service\FileSpecTypeService;
use Davework\Service\TemplateService;
use Psr\Container\ContainerInterface;

class CreateFileServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $templateService = $container->get(TemplateService::class);
        $fileSpecTypeService = $container->get(FileSpecTypeService::class);
        $topLevelNamespace = $container->get('config')->topLevelNamespace;
        $topLevelTestNamespace = $container->get('config')->testNamespace;
        $rootDirectory = $container->get('config')->rootDirectory;
        $testRootDirectory = $container->get('config')->testsDirectory;

        return new CreateFileService(
            $templateService,
            $fileSpecTypeService,
            $topLevelNamespace,
            $topLevelTestNamespace,
            $rootDirectory,
            $testRootDirectory
        );
    }
}
