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

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);


        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/composer.json');

        $this->assertEquals(true, $actual);

        $process->run();
    }

    public function testExecuteCommandReturnsSuccessMessage()
    {
        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = $commandTest->getDisplay();

        $this->assertEquals('Project successfully created', $actual);

        $process->run();
    }

    public function testExecuteCommandWithNoParameters()
    {
        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../../slim-skeleton');
        $process->run();

        $commandTest->execute([]);

        $actual = file_exists(__DIR__ . '/../../../slim-skeleton/composer.json');

        $this->assertEquals(true, $actual);

        $process->run();
    }

    public function testExecuteCommandWithJustName()
    {
        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../../woof-woof');
        $process->run();

        $commandTest->execute([
            'name' => 'woof-woof',
        ]);

        $actual = file_exists(__DIR__ . '/../../../woof-woof/composer.json');

        $this->assertEquals(true, $actual);

        $process->run();
    }

    public function testExecuteCommandWithJustLocation()
    {
        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/slim-skeleton');
        $process->run();

        $commandTest->execute([
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/slim-skeleton/composer.json');

        $this->assertEquals(true, $actual);

        $process->run();
    }
}
