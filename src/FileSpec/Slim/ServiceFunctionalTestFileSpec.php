<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ServiceFunctionalTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Service';
        $this->className = $fileName . 'Service';
        $this->filePath = $baseFilePath . '/tests/Service/' . $fileName . 'ServiceTest.php';

        $this->associatedFiles = [];
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
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}