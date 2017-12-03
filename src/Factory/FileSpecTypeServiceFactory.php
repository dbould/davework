<?php

namespace Davework\Factory;

use Davework\Service\FileSpecTypeService;
use Psr\Container\ContainerInterface;

class FileSpecTypeServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        $topLevelNamespace = $container->get('config')->topLevelNamespace;
        $topLevelTestNamespace = $container->get('config')->testNamespace;
        $rootDirectory = $container->get('config')->rootDirectory;
        $testRootDirectory = $container->get('config')->testsDirectory;

        return new FileSpecTypeService(
            $topLevelNamespace,
            $topLevelTestNamespace,
            $rootDirectory,
            $testRootDirectory
        );
    }
}