<?php
namespace Davework\FileSpec\Slim;

class FactoryFileSpec
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $topLevelNamespace . '\Factory';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '\Factory\\' . $fileName . 'Factory';

        $this->associatedFiles = [
            FactoryFunctionalTestFileSpecFileSpec::class
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
            $this->namespace,
            $this->fileName . 'Factory',
            $this->fileName);
    }
}
