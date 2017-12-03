<?php

namespace Davework\Service;

class FileSpecTypeService
{
    public function getRootDirectory($type, $rootDirectory, $testRootDirectory)
    {
        return (substr($type, -4) === 'Test') ? $testRootDirectory : $rootDirectory;
    }

    public function getTypeFromFileName($fileName)
    {
        $classArray = explode('\\', $fileName);
        $type = array_pop($classArray);

        return str_replace('FileSpec', '', $type);
    }

    public function getTopLevelNamespace($type, $topLevelNamespace, $topLevelTestNamespace)
    {
        if (substr($type, -4) === 'Test') {
            $topLevelNamespace = $topLevelTestNamespace;
        } else {
            $topLevelNamespace = $topLevelNamespace;
        }

        return $topLevelNamespace;
    }
}