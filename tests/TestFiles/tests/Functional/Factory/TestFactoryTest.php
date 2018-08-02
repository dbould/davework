<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Factory\TestFactory;
use Tests\SlimTestCase;

class TestFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(TestFactory::class);

        $this->assertInstanceOf(TestFactory::class, $actual);
    }
}
