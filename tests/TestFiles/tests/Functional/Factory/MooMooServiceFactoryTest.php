<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Service\MooMooService;
use Tests\SlimTestCase;

class MooMooServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(MooMooService::class);

        $this->assertInstanceOf(MooMooService::class, $actual);
    }
}
