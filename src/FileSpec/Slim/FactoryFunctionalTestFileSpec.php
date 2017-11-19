<?php
namespace Davework\FileSpec\Slim;

class FactoryFunctionalTestFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($namespace, $fileName, $baseFilePath)
    {
        $this->namespace = $namespace;
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
        $classToTest = 'Davework\Factory\\' . $this->fileName . 'Factory';

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