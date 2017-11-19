<?php
namespace Davework\FileSpec\Slim;

class ControllerFunctionalTestFileSpec
{
    private $topLevelNamespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->topLevelNamespace = $topLevelNamespace . '\Functional\Controller';
        $this->fileName = $fileName . 'Controller';
        $this->filePath = $baseFilePath . 'ControllerTest';

        $this->associatedFiles = [
        ];
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
}
