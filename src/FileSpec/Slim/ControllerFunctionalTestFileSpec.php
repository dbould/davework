<?php
namespace Davework\FileSpec\Slim;

class ControllerFunctionalTestFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($baseNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $baseNamespace . '\Controller\\' . $fileName . 'ControllerTest';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Controller\\' . $fileName . 'ControllerTest';

        $this->associatedFiles = [
        ];
    }

    public function getAssociatedFiles()
    {

    }
}
