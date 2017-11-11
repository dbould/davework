<?php

namespace Tests\Unit\Service;

use Davework\Service\TemplateService;
use Tests\SlimTestCase;

class TemplateServiceTest extends SlimTestCase
{
    public function testGetControllerTemplate()
    {
        $service = $this->getContainer()->get(TemplateService::class);

        $expected =  <<<'CONTROLLER'
<?php
namespace %s;

class %s
{
    public function action(Request $request, Response $response, array $args)
    {
        
        return $response;
    }
}

CONTROLLER;

        $actual = $service->getTemplate('Controller');

        $this->assertEquals($expected, $actual);
    }

    public function testGetControllerFunctionalTestTemplate()
    {
        $service = $this->getContainer()->get(TemplateService::class);

        $expected = <<<'CONTROLLERTEST'
<?php
namespace %s;

class %sTest extends BaseTestCase
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

CONTROLLERTEST;

        $actual = $service->getTemplate('ControllerFunctionalTest');

        $this->assertEquals($expected, $actual);
    }

    public function testGetFactoryTemplate()
    {
        $service = $this->getContainer()->get(TemplateService::class);

        $expected = <<<TESTFACTORY
<?php
namespace %s;

class %s
{
    public function __invoke()
    {
        return new %s();
    }
}

TESTFACTORY;

        $actual = $service->getTemplate('Factory');

        $this->assertEquals($expected, $actual);
    }

    public function testGetFactoryFunctionalTestTemplate()
    {
        $service = $this->getContainer()->get(TemplateService::class);

        $expected = <<<'FACTORYTEST'
<?php
namespace %s;

use %s;
use Tests\SlimTestCase;

class %sTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(%s::class);

        $this->assertInstanceOf(%s::class, $actual);
    }
}

FACTORYTEST;

        $actual = $service->getTemplate('FactoryFunctionalTest');

        $this->assertEquals($expected, $actual);
    }

    public function testGetServiceTemplate()
    {
        $service = $this->getContainer()->get(TemplateService::class);

        $expected = <<<'SERVICE'
<?php
namespace %s;

class %s
{
    public function __construct()
    {
        
    }
}

SERVICE;

        $actual = $service->getTemplate('Service');

        $this->assertEquals($expected, $actual);
    }

    public function testGetServiceFunctionalTestTemplate()
    {
        $service = $this->getContainer()->get(TemplateService::class);

        $expected = <<<'SERVICETEST'
<?php
namespace %s;

use %s;
use Tests\SlimTestCase;

class %sTest extends SlimTestCase
{
    public function test()
    {
        $this->assertEquals(true, false);
    }
}

SERVICETEST;

        $actual = $service->getTemplate('ServiceFunctionalTest');

        $this->assertEquals($expected, $actual);
    }
}
