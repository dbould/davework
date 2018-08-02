<?php
namespace Tests\Functional\Factory;

use Dbould\Davework\Field\Service\MooMooService;
use Tests\SlimTestCase;

class MooMooServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(Dbould\Davework\Field\Service\MooMooService::class);

        $this->assertInstanceOf(Dbould\Davework\Field\Service\MooMooService::class, $actual);
    }
}
