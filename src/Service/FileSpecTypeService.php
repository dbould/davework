<?php
namespace Dbould\Davework\Service;

class FileSpecTypeService
{
    public function __construct(
        $topLevelNamespace,
        $topLevelTestNamespace,
        $rootDirectory,
        $testRootDirectory
    )
    {
        $this->topLevelNamespace = $topLevelNamespace;
        $this->topLevelTestNamespace = $topLevelTestNamespace;
        $this->rootDirectory = $rootDirectory;
        $this->testRootDirectory = $testRootDirectory;
    }

    public function getRootDirectory($type)
    {
        return (substr($type, -4) === 'Test') ? $this->testRootDirectory : $this->rootDirectory;
    }

    public function getTypeFromFileName($fileName)
    {
        $classArray = explode('\\', $fileName);
        $type = array_pop($classArray);

        return str_replace('FileSpec', '', $type);
    }

    public function getTopLevelNamespace($type)
    {
        if (substr($type, -4) === 'Test') {
            $topLevelNamespace = $this->topLevelTestNamespace;
        } else {
            $topLevelNamespace = $this->topLevelNamespace;
        }

        return $topLevelNamespace = $this->topLevelNamespace;;
    }

    public function getTopLevelTestNamespace()
    {
        return $this->topLevelTestNamespace;
    }
}
