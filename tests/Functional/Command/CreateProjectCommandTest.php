<?php
namespace Tests\Functional\Command;

use Davework\Command\Slim\CreateProjectCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\SlimTestCase;

class CreateProjectCommandTest extends SlimTestCase
{
    public function testExecuteCreatesSlimProject()
    {
        $command = new CreateProjectCommand();
        $commandTest = new CommandTester($command);

        $commandTest->execute([]);

        $actual = $commandTest->getDisplay();

        $expected = 'HELLO WORLD';

        $this->assertEquals($expected, $actual);
    }
}