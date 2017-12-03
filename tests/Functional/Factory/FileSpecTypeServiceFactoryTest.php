<?php

namespace Tests\Functional\Factory;

use Davework\Service\CreateFileService;
use Tests\SlimTestCase;

class FileSpecTypeServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(CreateFileService::class);

        $this->assertInstanceOf(CreateFileService::class, $actual);
    }
}
