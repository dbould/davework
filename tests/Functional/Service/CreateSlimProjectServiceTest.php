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

        $process2 = new Process('chmod -R 777 ' . __DIR__ . '/../../TestFiles/project/slim-skeleton');
        $process2->run();
        foreach ($process2 as $type => $data) {
            if ($process2::OUT === $type) {
                echo "\nRead from stdout: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr: ".$data;
            }
        }

        $newProcess = new Process('ls -la ' . __DIR__ . '/../../TestFiles/project/slim-skeleton');
        $newProcess->run();
        foreach ($newProcess as $type => $data) {
            if ($newProcess::OUT === $type) {
                echo "\nRead from stdout: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr: ".$data;
            }
        }
        die();

        $this->assertEquals(true, $actual);

        $process->run();
    }
}
