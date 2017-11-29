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
