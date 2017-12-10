<?php
namespace Davework\Factory;

use Davework\Service\CreateSlimProjectService;
use Psr\Container\ContainerInterface;

class CreateSlimProjectServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container)
    {
        return new CreateSlimProjectService();
    }
}
