<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ControllerFunctionalTestFileSpec implements FileSpecInterface
{
    private $topLevelNamespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Controller';
        $this->fileName = $fileName . 'Controller';
        $this->filePath = $baseFilePath . '/tests/Controller/' . $fileName . 'ControllerTest.php';

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
            $this->fileName);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
