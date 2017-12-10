<?php
namespace Tests\Functional\Factory;

use Davework\Service\CreateSlimProjectService;
use Tests\SlimTestCase;

class CreateSlimProjectServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(CreateSlimProjectService::class);

        $this->assertInstanceOf(CreateSlimProjectService::class, $actual);
    }
}
