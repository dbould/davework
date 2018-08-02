<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Factory\TestFactory;
use Tests\SlimTestCase;

class TestFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Dbould\Davework\Factory\TestFactory::class);

        $this->assertInstanceOf(Dbould\Davework\Factory\TestFactory::class, $actual);
    }
}
