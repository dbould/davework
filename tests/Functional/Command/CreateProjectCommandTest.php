<?php
namespace Tests\Functional\Command;

use Davework\Command\Slim\CreateProjectCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\SlimTestCase;

class CreateProjectCommandTest extends SlimTestCase
{
    public function testExecuteCreatesSlimProject()
    {
        $fileNames = [
            __DIR__ . '/../../TestFiles/src/Service/MooMooService.php',
            __DIR__ . '/../../TestFiles/tests/Functional/Service/MooMooServiceTest.php',
            __DIR__ . '/../../TestFiles/src/Factory/MooMooServiceFactory.php',
            __DIR__ . '/../../TestFiles/tests/Functional/Factory/MooMooServiceFactoryTest.php',
        ];

        foreach ($fileNames as $fileName) {
            if (file_exists($fileName)) {
                unlink($fileName);
            }
        }

        $command = new CreateProjectCommand();
        $commandTest = new CommandTester($command);

        $commandTest->execute([]);

        $actual = $commandTest->getDisplay();

        $expected = 'HELLO WORLD';

        $this->assertEquals($expected, $actual);
    }
}