<?php

namespace Tests\Functional\Service;

use Davework\Service\CreateFileService;
use Tests\SlimTestCase;

class CreateFileServiceTest extends SlimTestCase
{
    public function testItCreatesControllerFile()
    {
        $fileNames = [
            __DIR__ . '/../../TestFiles/src/Controller/TestController.php',
            __DIR__ . '/../../TestFiles/tests/Controller/TestControllerTest.php',
            __DIR__ . '/../../TestFiles/src/Factory/TestFactory.php',
            __DIR__ . '/../../TestFiles/tests/Factory/TestFactoryTest.php',
        ];

        foreach ($fileNames as $fileName) {
            if (file_exists($fileName)) {
                unlink($fileName);
            }
        }

        /** @var CreateFileService $service **/
        $service = $this->getContainer()->get(CreateFileService::class);
        $service->create('Test', 'Controller');

        $expected = <<<'TESTCONTROLLER'
<?php
namespace Davework\Controller;

class TestController
{
    public function action(Request $request, Response $response, array $args)
    {
        
        return $response;
    }
}

TESTCONTROLLER;

        $actual = file_get_contents( __DIR__ . '/../../TestFiles/src/Controller/TestController.php');
        $this->assertEquals($expected, $actual);
    }

    public function testItCreatesControllerTestFile()
    {
        $fileName = __DIR__ . '/../../TestFiles/tests/Controller/TestControllerTest.php';

        if (file_exists($fileName)) {
            unlink($fileName);
        }

        $service = $this->getContainer()->get(CreateFileService::class);
        $service->create('Test', 'ControllerFunctionalTest');

        $expected = <<<'TESTCONTROLLERTEST'
<?php
namespace Tests\Functional\Controller;

class TestControllerTest extends BaseTestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
    public function testAction()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('SlimFramework', (string)$response->getBody());
        $this->assertNotContains('Hello', (string)$response->getBody());
    }
}

TESTCONTROLLERTEST;

        $actual = file_get_contents($fileName);

        $this->assertEquals($expected, $actual);
    }

    public function testItCreatesFactoryFile()
    {
        $fileNames = [

            __DIR__ . '/../../TestFiles/src/Factory/TestFactory.php',
            __DIR__ . '/../../TestFiles/tests/Factory/TestFactoryTest.php',
        ];

        foreach ($fileNames as $fileName) {
            if (file_exists($fileName)) {
                unlink($fileName);
            }
        }

        $service = $this->getContainer()->get(CreateFileService::class);
        $service->create('Test', 'Factory');

        $expected = <<<'TESTFACTORY'
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

        $actual = file_get_contents(__DIR__ . '/../../TestFiles/src/Factory/TestFactory.php');

        $this->assertEquals($expected, $actual);
    }

    public function testItCreatesFactoryTestFile()
    {
        $fileName = __DIR__ . '/../../TestFiles/tests/Factory/TestFactoryTest.php';

        if (file_exists($fileName)) {
            unlink($fileName);
        }

        $service = $this->getContainer()->get(CreateFileService::class);
        $service->create('Test', 'FactoryFunctionalTest');

        $expected = <<<'TESTFACTORYTEST'
<?php
namespace Tests\Functional\Factory;

use Davework\Factory\TestFactory;
use Tests\SlimTestCase;

class TestFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Davework\Factory\TestFactory::class);

        $this->assertInstanceOf(Davework\Factory\TestFactory::class, $actual);
    }
}

TESTFACTORYTEST;

        $actual = file_get_contents($fileName);

        $this->assertEquals($expected, $actual);
    }

    public function testItCreatesServiceFile()
    {
        $fileNames = [
            __DIR__ . '/../../TestFiles/src/Service/TestService.php',
            __DIR__ . '/../../TestFiles/tests/Service/TestServiceTest.php',
            __DIR__ . '/../../TestFiles/src/Factory/TestFactory.php',
            __DIR__ . '/../../TestFiles/tests/Factory/TestFactoryTest.php',
        ];

        foreach ($fileNames as $fileName) {
            if (file_exists($fileName)) {
                unlink($fileName);
            }
        }

        $service = $this->getContainer()->get(CreateFileService::class);
        $service->create('Test', 'Service');

        $expected = <<<'TESTFACTORYTEST'
<?php
namespace Tests\Functional\Factory;

use Davework\Factory\TestFactory;
use Tests\SlimTestCase;

class TestFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Davework\Factory\TestFactory::class);

        $this->assertInstanceOf(Davework\Factory\TestFactory::class, $actual);
    }
}

TESTFACTORYTEST;

        $actual = file_get_contents(__DIR__ . '/../../TestFiles/tests/Factory/TestFactoryTest.php');

        $this->assertEquals($expected, $actual);
    }

    public function testItCreatesTestFactoryCorrectlyForServiceFile()
    {
        $fileNames = [
            __DIR__ . '/../../TestFiles/src/Service/TestService.php',
            __DIR__ . '/../../TestFiles/tests/Service/TestServiceTest.php',
            __DIR__ . '/../../TestFiles/src/Factory/TestFactory.php',
            __DIR__ . '/../../TestFiles/tests/Factory/TestFactoryTest.php',
        ];

        foreach ($fileNames as $fileName) {
            if (file_exists($fileName)) {
                unlink($fileName);
            }
        }

        $service = $this->getContainer()->get(CreateFileService::class);
        $service->create('Test', 'Service');

        $expected = <<<'TESTSERVICE'
<?php
namespace Davework\Service;

class TestService
{
    public function __construct()
    {
        
    }
}

TESTSERVICE;

        $actual = file_get_contents(__DIR__ . '/../../TestFiles/src/Service/TestService.php');

        $this->assertEquals($expected, $actual);
    }

    public function testItCreatesServiceTestFile()
    {
        $fileName = __DIR__ . '/../../TestFiles/tests/Service/TestServiceTest.php';

        if (file_exists($fileName)) {
            unlink($fileName);
        }

        $service = $this->getContainer()->get(CreateFileService::class);
        $service->create('Test', 'ServiceFunctionalTest');

        $expected = <<<'TESTSERVICETEST'
<?php
namespace Tests\Functional\Service;

use Davework\Service\TestService;
use Tests\SlimTestCase;

class TestServiceTest extends SlimTestCase
{
    public function test()
    {
        $this->assertEquals(true, false);
    }
}

TESTSERVICETEST;

        $actual = file_get_contents($fileName);

        $this->assertEquals($expected, $actual);
    }
}
