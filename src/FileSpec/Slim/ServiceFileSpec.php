<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ServiceFileSpec implements FileSpecInterface
{
    private $namespace;
    private $fileName;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $topLevelNamespace . '\Service';
        $this->fileName = $fileName;
        $this->filePath = $baseFilePath . '/src/Service/' . $fileName . 'Service.php';

        $this->associatedFiles = [
            ServiceFunctionalTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryFunctionalTestFileSpecFileSpec::class,
        ];
    }

    public function getFileContent($template)
    {
        return sprintf(
            $template,
            $this->namespace,
            $this->fileName . 'Service');
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }
}