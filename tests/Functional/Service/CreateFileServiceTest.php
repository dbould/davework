<?php

namespace Tests\Functional\Service;

use Davework\Service\CreateFileService;
use Tests\SlimTestCase;

class CreateFileServiceTest extends SlimTestCase
{
    public function testItCreatesFactoryFile()
    {
        $fileName = __DIR__ . '/../../TestFiles/src/Factory/TestFactory.php';

        if (file_exists($fileName)) {
            unlink($fileName);
        }

        $service = $this->getContainer()->get(CreateFileService::class);
        $service->create('Test', 'factory');

        $expected = <<<TESTFACTORY
<?php
namespace Davework\Factory;

class TestFactory
{
    public function __invoke()
    {
        return new Test();
    }
}

TESTFACTORY;

        $actual = file_get_contents($fileName);

        $this->assertEquals($expected, $actual);
    }
}