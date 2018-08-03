<?php
namespace Tests\Functional\Diary\Factory;

use Dbould\Davework\Diary\Service\TestService;
use Tests\SlimTestCase;

class TestServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(TestService::class);

        $this->assertInstanceOf(TestService::class, $actual);
    }
}
