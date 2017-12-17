<?php
namespace Davework\Factory;

use Davework\Service\CreateSlimProjectService;
use Psr\Container\ContainerInterface;
use Symfony\Component\Process\Process;

class CreateSlimProjectServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @return CreateSlimProjectService
     */
    public function __invoke(ContainerInterface $container)
    {
        $location = __DIR__ . '/../../tests/TestFiles/project/slim-skeleton';

        $process = new Process('git clone https://github.com/slimphp/Slim-Skeleton.git ' . $location);

        return new CreateSlimProjectService($process);
    }
}
