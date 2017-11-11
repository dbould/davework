<?php
namespace Davework\FileSpec\Slim;

class ServiceFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($baseNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $baseNamespace . '\Service\\' . $fileName . 'Service';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Service\\' . $fileName . 'Service';

        $this->associatedFiles = [
            ServiceFunctionalTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryFunctionalTestFileSpecFileSpec::class,
        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }
}