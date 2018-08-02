<?php

namespace Tests\Functional\Factory;

use Dbould\Davework\Service\CreateFileService;
use Tests\SlimTestCase;

class CreateFileServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(CreateFileService::class);

        $this->assertInstanceOf(CreateFileService::class, $actual);
    }
}
