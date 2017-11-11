<?php
namespace Davework\FileSpec\Slim;

class FactoryFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($baseNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $baseNamespace . 'Factory\\' . $fileName . 'Factory';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Factory\\' . $fileName;

        $this->associatedFiles = [
            FactoryFunctionalTestFileSpecFileSpec::class
        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }
}