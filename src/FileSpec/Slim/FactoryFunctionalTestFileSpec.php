<?php
namespace Davework\FileSpec\Slim;

class FactoryFunctionalTestFileSpecFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($baseNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $baseNamespace . '\Factory\\' . $fileName . 'FactoryTest';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Factory\\' . $fileName . 'FactoryTest';

        $this->associatedFiles = [

        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }
}
