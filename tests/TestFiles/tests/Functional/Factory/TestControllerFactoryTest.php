<?php
namespace Tests\Functional\Factory;

use Davework\Controller\TestController;
use Tests\SlimTestCase;

class TestControllerFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Davework\Controller\TestController::class);

        $this->assertInstanceOf(Davework\Controller\TestController::class, $actual);
    }
}
