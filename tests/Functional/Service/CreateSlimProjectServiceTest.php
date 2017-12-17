<?php
namespace Tests\Functional\Service;

use Davework\Service\CreateSlimProjectService;
use Symfony\Component\Process\Process;
use Tests\SlimTestCase;

class CreateSlimProjectServiceTest extends SlimTestCase
{
    public function testSlimSkeletonGetsCloned()
    {
        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/slim-skeleton');
        $process->run();

        /** @var CreateSlimProjectService $service */
        $service = $this->getContainer()->get(CreateSlimProjectService::class);
        $service->createProject();

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/slim-skeleton/composer.json');

        $newProcess = new Process('ls -la ' . __DIR__ . '/../../TestFiles/project');
        $newProcess->run();

        $this->assertEquals(true, $actual);

        $process->run();
    }
}
