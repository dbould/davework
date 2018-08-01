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
        $factoriesLiveWithClasses = $container->get('config')->factoriesLiveWithClasses;

        return new CreateFileService(
            $templateService,
            $fileSpecTypeService,
            $factoriesLiveWithClasses
        );
    }
}
