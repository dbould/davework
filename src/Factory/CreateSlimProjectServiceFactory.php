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
        if (isset($container->get('config')->newProjectDirectory)) {
            $location = $container->get('config')->newProjectDirectory;
        } else {
            $location = $container->get('config')->rootDirectory;
        }

        $process = new Process('git clone https://github.com/slimphp/Slim-Skeleton.git ' . $location);

        return new CreateSlimProjectService($process);
    }
}
