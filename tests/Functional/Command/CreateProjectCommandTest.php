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
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

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

        if (file_exists(__DIR__ . '/../../davework.phar.bak')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar.bak '. __DIR__ . '/../../davework.phar');
            $process->run();
        }

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandReturnsSuccessMessage()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

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

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandWithNoParameters()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../../slim-skeleton');
        $process->run();

        $commandTest->execute([]);

        $actual = file_exists(__DIR__ . '/../../../slim-skeleton/composer.json');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandWithJustName()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

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

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandWithJustLocation()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

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

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandCreatesProjectFactoryController()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/src/Controller');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandCreatesProjectFactoryFolder()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/src/Factory');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandCreatesProjectServiceFolder()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/src/Service');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandCreatesProjectControllerTestFolder()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/tests/Functional/Controller');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandCreatesProjectFactoryTestFolder()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/tests/Functional/Factory');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandCreatesProjectServiceTestFolder()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/tests/Functional/Service');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandMovesJsonToNewDirectory()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $process = new Process('touch ' . __DIR__ . 'davework.json');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/davework.json');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCommandMovesPharToNewDirectory()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        if (!file_exists(__DIR__ . '/../../davework.json')) {
            $process = new Process('cp ' . __DIR__ . '/../../davework.json.example ' . __DIR__ . '/../../davework.json');
            $process->run();
        }

        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $process = new Process('touch ' . __DIR__ . 'davework.phar');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/davework.phar');

        $this->assertEquals(true, $actual);

        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }
}
