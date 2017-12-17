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

        $process2 = new Process('chmod -R 777 ' . __DIR__ . '/../../TestFiles/Project/slim-skeleton');
        $process2->run();
        foreach ($process2 as $type => $data) {
            if ($process2::OUT === $type) {
                echo "\nRead from stdout2: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr2: ".$data;
            }
        }

        $process3 = new Process('ls -la ' . __DIR__ . '/../../TestFiles/Project/slim-skeleton');
        $process3->run();
        foreach ($process3 as $type => $data) {
            if ($process3::OUT === $type) {
                echo "\nRead from stdout3: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr3: ".$data;
            }
        }

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/slim-skeleton/composer.json');

        $newProcess = new Process('ls -la ' . __DIR__ . '/../../TestFiles/project');
        $newProcess->run();

        foreach ($newProcess as $type => $data) {
            if ($newProcess::OUT === $type) {
                echo "\nRead from stdout4: ".$data;
            } else { // $process::ERR === $type
                echo "\nRead from stderr4: ".$data;
            }
        }
        $newProcess->run();
die();

        $this->assertEquals(true, $actual);

        $process->run();
    }
}
