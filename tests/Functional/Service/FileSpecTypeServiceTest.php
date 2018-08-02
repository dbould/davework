<?php
namespace Tests\Functional\Service;

use Dbould\Davework\Service\FileSpecTypeService;
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

    public function testGetRootDirectoryForTest()
    {
        $service = $this->getContainer()->get(FileSpecTypeService::class);
        $actual = $service->getRootDirectory('ControllerTest');

        $expected = $this->getContainer()->get('config')->testsDirectory;

        $this->assertEquals($expected, $actual);
    }

    public function testGetTypeFromFileName()
    {
        $service = $this->getContainer()->get(FileSpecTypeService::class);
        $actual = $service->getTypeFromFileName(FactoryTestFileSpec::class);

        $expected = 'FactoryTest';

        $this->assertEquals($expected, $actual);
    }

    public function testGetTopLevelNamespaceForNonTest()
    {
        $service = $this->getContainer()->get(FileSpecTypeService::class);
        $actual = $service->getTopLevelNamespace('Controller');

        $expected = $this->getContainer()->get('config')->topLevelNamespace;

        $this->assertEquals($expected, $actual);
    }

    public function testGetTopLevelNamespaceForTest()
    {
        $service = $this->getContainer()->get(FileSpecTypeService::class);
        $actual = $service->getTopLevelNamespace('ControllerTest');

        $expected = $this->getContainer()->get('config')->topLevelNamespace;

        $this->assertEquals($expected, $actual);
    }
}
