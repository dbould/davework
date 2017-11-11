<?php
namespace Davework\FileSpec\Slim;

class ServiceFunctionalTestFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $topLevelNamespace . '\Service';
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
        $classToTest = $this->topLevelNamespace . '\Service\\' . $this->fileName . 'Service';

        return sprintf(
            $template,
            $this->namespace,
            $classToTest,
            $this->fileName . 'Service',
            $this->fileName);
    }
}