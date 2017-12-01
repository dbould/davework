<?php
namespace Tests\Functional\Factory;

use Davework\Factory\TestControllerFactory;
use Tests\SlimTestCase;

class TestControllerFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Davework\Factory\TestControllerFactory::class);

        $this->assertInstanceOf(Davework\Factory\TestControllerFactory::class, $actual);
    }
}
