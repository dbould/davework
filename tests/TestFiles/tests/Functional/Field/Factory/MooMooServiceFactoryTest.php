<?php
namespace Tests\Functional\Field\Factory;

use Dbould\Davework\Field\Service\MooMooService;
use Tests\SlimTestCase;

class MooMooServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(MooMooService::class);

        $this->assertInstanceOf(MooMooService::class, $actual);
    }
}
