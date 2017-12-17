<?php
namespace Tests\Functional\Command;

use Davework\Command\Slim\CreateProjectCommand;
use Davework\Service\CreateSlimProjectService;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\SlimTestCase;

class CreateProjectCommandTest extends SlimTestCase
{
    public function testExecuteCreatesSlimProject()
    {
        $service = $this->getContainer()->get(CreateSlimProjectService::class);

        $command = new CreateProjectCommand($service);
        $commandTest = new CommandTester($command);

        $commandTest->execute([]);

        $actual = $commandTest->getDisplay();

        $expected = 'HELLO WORLD';

        $this->assertEquals($expected, $actual);
    }
}