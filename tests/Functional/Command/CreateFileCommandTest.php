<?php
namespace Tests\Functional\Command;

use Dbould\Davework\Command\Slim\CreateFileCommand;
use Dbould\Davework\Service\CreateFileService;
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
namespace Dbould\Davework\Service;

class MooMooService
{
    public function __construct()
    {
        
    }
}

TESTSERVICE;

        $this->assertEquals($expected, $actual);
    }

    public function testExecuteCreatesServiceTestFile()
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

        $actual = file_get_contents($fileNames[1]);

        $expected = <<<'TESTSERVICE'
<?php
namespace Tests\Functional\Service;

use Dbould\Davework\Service\MooMooService;
use Tests\SlimTestCase;

class MooMooServiceTest extends SlimTestCase
{
    public function test()
    {
        $this->assertEquals(true, false);
    }
}

TESTSERVICE;

        $this->assertEquals($expected, $actual);
    }

    public function testExecuteCreatesFactoryFile()
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

        $actual = file_get_contents($fileNames[2]);

        $expected = <<<'TESTSERVICE'
<?php
namespace Dbould\Davework\Factory;

class MooMooServiceFactory
{
    public function __invoke()
    {
        return new MooMooService();
    }
}

TESTSERVICE;

        $this->assertEquals($expected, $actual);
    }

    public function testExecuteCreatesFactoryTestFile()
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

        $actual = file_get_contents($fileNames[3]);

        $expected = <<<'TESTSERVICE'
<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Service\MooMooService;
use Tests\SlimTestCase;

class MooMooServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(MooMooService::class);

        $this->assertInstanceOf(MooMooService::class, $actual);
    }
}

TESTSERVICE;

        $this->assertEquals($expected, $actual);
    }

    public function testExecuteCreatesServiceFileToModule()
    {
        $fileNames = [
            __DIR__ . '/../../TestFiles/src/Field/Service/MooMooService.php',
            __DIR__ . '/../../TestFiles/tests/Functional/Field/Service/MooMooServiceTest.php',
            __DIR__ . '/../../TestFiles/src/Field/Factory/MooMooServiceFactory.php',
            __DIR__ . '/../../TestFiles/tests/Functional/Field/Factory/MooMooServiceFactoryTest.php',
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
            'module' => 'Field',
        ]);

        $actual = file_get_contents($fileNames[0]);

        $expected = <<<'TESTSERVICE'
<?php
namespace Dbould\Davework\Field\Service;

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
