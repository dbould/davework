<?php

namespace Davework\Service;

class FileSpecTypeService
{
    public function getRootDirectory($type, $rootDirectory, $testRootDirectory)
    {
        return (substr($type, -4) === 'Test') ? $testRootDirectory : $rootDirectory;
    }
}