<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Service\TestService;
use Tests\SlimTestCase;

class TestServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Dbould\Davework\Service\TestService::class);

        $this->assertInstanceOf(Dbould\Davework\Service\TestService::class, $actual);
    }
}
