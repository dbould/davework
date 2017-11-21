<?php
namespace Davework\FileSpec\Slim;

class ServiceFunctionalTestFileSpec
{
    private $topLevelNamespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Service';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '/Service/' . $fileName . 'ServiceTest';

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
            $this->topLevelNamespace,
            $classToTest,
            $this->fileName . 'Service',
            $this->fileName);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}