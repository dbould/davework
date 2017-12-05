<?php
namespace Tests\Functional\Factory;

use Davework\Factory\MooMooServiceFactory;
use Tests\SlimTestCase;

class MooMooServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Davework\Factory\MooMooServiceFactory::class);

        $this->assertInstanceOf(Davework\Factory\MooMooServiceFactory::class, $actual);
    }
}
