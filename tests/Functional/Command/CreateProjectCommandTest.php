<?php
namespace Tests\Functional\Command;

use Davework\Command\Slim\CreateProjectCommand;
use Davework\Service\CreateSlimProjectService;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Process\Process;
use Tests\SlimTestCase;

class CreateProjectCommandTest extends SlimTestCase
{
    public function testExecuteCreatesSlimProject()
    {
        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $commandTest->execute([]);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/slim-skeleton');
        $process->run();

        /** @var CreateSlimProjectService $service */
        $service = $this->getContainer()->get(CreateSlimProjectService::class);
        $service->createProject();

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/slim-skeleton/composer.json');

        $this->assertEquals(true, $actual);

        $process->run();
    }

    public function testExecuteCommandReturnsSuccessMessage()
    {
        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $commandTest->execute([]);

        $actual = $commandTest->getDisplay();

        $this->assertEquals('Project successfully created', $actual);
    }
}
