<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Service\MooMooService;
use Tests\SlimTestCase;

class MooMooServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Dbould\Davework\Service\MooMooService::class);

        $this->assertInstanceOf(Dbould\Davework\Service\MooMooService::class, $actual);
    }
}
