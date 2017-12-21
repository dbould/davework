<?php
namespace Tests\Functional\Command;

use Davework\Command\Slim\CreateProjectCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Process\Process;
use Tests\SlimTestCase;

class CreateProjectCommandTest extends SlimTestCase
{
    private static $testCreateCommand;

    public static function setUpBeforeClass()
    {
        if (file_exists(__DIR__ . '/../../davework.phar')) {
            $process = new Process('mv ' . __DIR__ . '/../../davework.phar '. __DIR__ . '/../../davework.phar.bak');
            $process->run();
        }

        $command = new CreateProjectCommand();
        $commandTest = new CommandTester($command);

        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $process = new Process('touch ' . __DIR__ . '/../../../davework.phar');
        $process->run();

        $commandTest->execute([
            'name' => 'moo-moo',
            'location' => __DIR__ . '/../../TestFiles/project',
        ]);

        self::$testCreateCommand = $commandTest;

        $process = new Process('cp ' . __DIR__ . '/../../../davework.json.example ' . __DIR__ . '/../../../davework.json');
        $process->run();
    }

    public static function tearDownAfterClass()
    {
        $process = new Process('rm -rf ' . __DIR__ . '/../../TestFiles/project/moo-moo');
        $process->run();

        $process = new Process('cp davework.json.example davework.json');
        $process->run();
    }

    public function testExecuteCreatesSlimProject()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/composer.json');

        $this->assertEquals(true, $actual);
    }

    public function testExecuteCommandReturnsSuccessMessage()
    {
        $actual = self::$testCreateCommand->getDisplay();
        $this->assertEquals('Project successfully created', $actual);
    }

    public function testExecuteCommandCreatesProjectControllerDirectory()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/src/Controller');
        $this->assertEquals(true, $actual);
    }

    public function testExecuteCommandCreatesProjectControllerTestFolder()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/tests/Functional/Controller');

        $this->assertEquals(true, $actual);
    }

    public function testExecuteCommandCreatesProjectFactoryTestFolder()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/tests/Functional/Factory');

        $this->assertEquals(true, $actual);
    }

    public function testExecuteCommandCreatesProjectServiceTestFolder()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/tests/Functional/Service');

        $this->assertEquals(true, $actual);
    }

    public function testExecuteCommandMovesJsonToNewDirectory()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/davework.json');

        $this->assertEquals(true, $actual);
    }

    public function testExecuteCommandCreatesProjectFactoryFolder()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/src/Factory');
        $this->assertEquals(true, $actual);
    }

    public function testExecuteCommandCreatesProjectServiceFolder()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/src/Service');
        $this->assertEquals(true, $actual);
    }

    public function testExecuteCommandMovesPharToNewDirectory()
    {
        $actual = file_exists(__DIR__ . '/../../TestFiles/project/moo-moo/davework.phar');
        $this->assertEquals(true, $actual);
    }
}
