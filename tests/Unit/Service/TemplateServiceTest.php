<?php

namespace Tests\Unit\Service;

use Davework\Service\TemplateService;
use Tests\SlimTestCase;

class TemplateServiceTest extends SlimTestCase
{
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
}