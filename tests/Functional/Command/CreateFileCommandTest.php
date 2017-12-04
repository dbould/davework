<?php
namespace Tests\Functional\Command;

use Davework\Command\Slim\CreateFileCommand;
use Davework\Service\CreateFileService;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\SlimTestCase;

class CreateFileCommandTest extends SlimTestCase
{
    public function testExecuteCreatesServiceFile()
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

        $command = new CreateFileCommand($this->getContainer()->get(CreateFileService::class));
        $commandTest = new CommandTester($command);

        $commandTest->execute([
            'file-name' => 'MooMoo',
            'type' => 'Service',
        ]);

        $actual = file_get_contents($fileNames[0]);

        $expected = <<<'TESTSERVICE'
<?php
namespace Davework\Service;

class MooMooService
{
    public function __construct()
    {
        
    }
}

TESTSERVICE;

        $this->assertEquals($expected, $actual);
    }
}