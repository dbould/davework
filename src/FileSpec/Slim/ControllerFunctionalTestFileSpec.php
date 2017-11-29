<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ControllerFunctionalTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Controller';
        $this->className = $fileName . 'Controller';
        $this->filePath = $baseFilePath . '/tests/Functional/Controller/' . $fileName . 'ControllerTest.php';

        $this->associatedFiles = [];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        return sprintf(
            $template,
            $this->topLevelNamespace,
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function getClassName()
    {
        return $this->className;
    }
}
