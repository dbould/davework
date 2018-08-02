<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Controller\TestController;
use Tests\SlimTestCase;

class TestControllerFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(TestController::class);

        $this->assertInstanceOf(TestController::class, $actual);
    }
}
