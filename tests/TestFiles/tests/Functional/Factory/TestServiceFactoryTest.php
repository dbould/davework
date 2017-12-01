<?php
namespace Tests\Functional\Factory;

use Davework\Factory\TestServiceFactory;
use Tests\SlimTestCase;

class TestServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Davework\Factory\TestServiceFactory::class);

        $this->assertInstanceOf(Davework\Factory\TestServiceFactory::class, $actual);
    }
}
