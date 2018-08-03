<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Service\TestService;
use Tests\SlimTestCase;

class TestServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(TestService::class);

        $this->assertInstanceOf(TestService::class, $actual);
    }
}
