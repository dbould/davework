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
        $process = new Process('git clone https://github.com/slimphp/Slim-Skeleton.git tests/TestFiles/Project/slim-skeleton');

        return new CreateSlimProjectService($process);
    }
}
