<?php
namespace Davework\FileSpec\Slim;

class ServiceFunctionalTestFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($baseNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $baseNamespace . '\Service\\' . $fileName . 'ServiceTest';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Service\\' . $fileName . 'ServiceTest';

        $this->associatedFiles = [

        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }
}