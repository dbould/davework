<?php
namespace Davework\FileSpec\Slim;

class ControllerFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($baseNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $baseNamespace . 'Controller\\' . $fileName . 'Controller';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Controller\\' . $fileName . 'Controller';

        $this->associatedFiles = [

            FactoryFunctionalTestFileSpecFileSpec::class
        ];
    }

    public function getAssociatedFiles()
    {

    }
}