<?php

namespace Dbould\Davework\Factory;

use Dbould\Davework\Service\CreateFileService;
use Dbould\Davework\Service\FileSpecTypeService;
use Dbould\Davework\Service\TemplateService;
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
