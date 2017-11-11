<?php
namespace Davework\FileSpec\Slim;

class FactoryFunctionalTestFileSpecFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $topLevelNamespace . '\Factory';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Factory\\' . $fileName . 'FactoryTest';

        $this->associatedFiles = [

        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        $classToTest = $this->topLevelNamespace . '\Factory\\' . $this->fileName . 'Factory';

        return sprintf(
            $template,
            $this->namespace,
            $classToTest,
            $this->fileName . 'Factory',
            $classToTest,
            $classToTest
        );
    }
}
