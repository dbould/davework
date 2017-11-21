<?php
namespace Davework\FileSpec\Slim;

class FactoryFunctionalTestFileSpec
{
    private $topLevelNamespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Factory';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '/Factory/' . $fileName . 'FactoryTest';

        $this->associatedFiles = [];
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
            $this->topLevelNamespace,
            $classToTest,
            $this->fileName . 'Factory',
            $classToTest,
            $classToTest
        );
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
