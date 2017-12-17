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

        $process2 = new Process('ls -la ' . __DIR__ . '/../../TestFiles/Project/slim-skeleton');
        $process2->run();
        foreach ($process2 as $type => $data) {
            if ($process2::OUT === $type) {
                echo "\nRead from stdout: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr: ".$data;
            }
        }
        die();

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/slim-skeleton/composer.json');

        $newProcess = new Process('ls -la ' . __DIR__ . '/../../TestFiles/project');
        $newProcess->run();

        $this->assertEquals(true, $actual);

        $process->run();
    }
}
