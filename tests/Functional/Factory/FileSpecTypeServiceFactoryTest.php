<?php

namespace Tests\Functional\Factory;

use Davework\Service\FileSpecTypeService;
use Tests\SlimTestCase;

class FileSpecTypeServiceFactoryTest extends SlimTestCase
{
    public function testItReturnsAnInstance()
    {
        $actual = $this->getContainer()->get(FileSpecTypeService::class);

        $this->assertInstanceOf(FileSpecTypeService::class, $actual);
    }
}
