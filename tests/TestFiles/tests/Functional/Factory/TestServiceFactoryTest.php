<?php
namespace Tests\Functional\Factory;

use Davework\Service\TestService;
use Tests\SlimTestCase;

class TestServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Davework\Service\TestService::class);

        $this->assertInstanceOf(Davework\Service\TestService::class, $actual);
    }
}
