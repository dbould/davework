<?php
namespace Tests\Functional\Service;

use Davework\Service\CreateSlimProjectService;
use Symfony\Component\Process\Process;
use Tests\SlimTestCase;

class CreateSlimProjectServiceTest extends SlimTestCase
{
    public function testSlimSkeletonGetsClonedToLocationInConfig()
    {
        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/slim-skeleton');
        $process->run();

        /** @var CreateSlimProjectService $service */
        $service = $this->getContainer()->get(CreateSlimProjectService::class);
        $service->createProject();

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/slim-skeleton/composer.json');

        $this->assertEquals(true, $actual);

        $process->run();
    }

    public function testSlimSkeletonGetsClonedToDefaultLocation()
    {
        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/slim-skeleton');
        $process->run();

        $config = $this->getContainer()->get('config');
        unset($config->newProjectDirectory);

        $this->getContainer()['config'] = $config;

        /** @var CreateSlimProjectService $service */
        $service = $this->getContainer()->get(CreateSlimProjectService::class);
        $service->createProject();

        $actual = file_exists(__DIR__ . '/../../TestFiles/slim-skeleton/composer.json');

        $this->assertEquals(true, $actual);

        $process->run();
    }
}
