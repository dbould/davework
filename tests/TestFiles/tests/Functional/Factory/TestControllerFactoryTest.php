<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Controller\TestController;
use Tests\SlimTestCase;

class TestControllerFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Dbould\Davework\Controller\TestController::class);

        $this->assertInstanceOf(Dbould\Davework\Controller\TestController::class, $actual);
    }
}
