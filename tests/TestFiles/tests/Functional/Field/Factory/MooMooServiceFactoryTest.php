<?php
namespace Tests\Functional\Factory;

use Davework\Service\MooMooService;
use Tests\SlimTestCase;

class MooMooServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Davework\Service\MooMooService::class);

        $this->assertInstanceOf(Davework\Service\MooMooService::class, $actual);
    }
}
