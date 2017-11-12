<?php
namespace Davework\FileSpec\Slim;

class ServiceFunctionalTestFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($namespace, $fileName, $baseFilePath)
    {
        $this->namespace = $namespace;
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Service\\' . $fileName . 'ServiceTest';

        $this->associatedFiles = [

        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = 'Davework\Service\\' . $this->fileName . 'Service';

        return sprintf(
            $template,
            $this->namespace,
            $classToTest,
            $this->fileName . 'Service',
            $this->fileName);
    }
}