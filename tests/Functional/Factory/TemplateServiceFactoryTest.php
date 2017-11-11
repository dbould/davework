<?php

namespace Tests\Functional\Factory;

use Davework\Service\TemplateService;
use Tests\SlimTestCase;

class TemplateServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(TemplateService::class);

        $this->assertInstanceOf(TemplateService::class, $actual);
    }
}