<?php
namespace Tests\Functional\Service;

use Davework\Service\FileSpecTypeService;
use Tests\SlimTestCase;

class FileSpecTypeServiceTest extends SlimTestCase
{
    public function testGetRootDirectoryForNonTest()
    {
        $service = $this->getContainer()->get(FileSpecTypeService::class);
        $actual = $service->getRootDirectory('Controller');

        $expected = $this->getContainer()->get('config')->rootDirectory;

        $this->assertEquals($expected, $actual);
    }

    public function testGetTypeFromFileNameForTest()
    {
        $service = $this->getContainer()->get(FileSpecTypeService::class);
        $actual = $service->getRootDirectory('ControllerTest');

        $expected = $this->getContainer()->get('config')->testsDirectory;

        $this->assertEquals($expected, $actual);
    }

    public function testGetTopLevelNamespace()
    {

    }
}
