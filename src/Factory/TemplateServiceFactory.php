<?php

namespace Davework\Factory;

use Davework\Service\TemplateService;
use Psr\Container\ContainerInterface;

class TemplateServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        return new TemplateService();
    }
}