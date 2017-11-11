<?php
namespace Davework\FileSpec\Slim;

class ControllerFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $topLevelNamespace . '\Controller';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Controller\\' . $fileName . 'Controller.php';

        $this->associatedFiles = [
            ControllerFunctionalTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryFunctionalTestFileSpecFileSpec::class,
        ];
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getFileContent($template)
    {
        return sprintf($template, $this->namespace, $this->fileName . 'Controller');
    }
}
