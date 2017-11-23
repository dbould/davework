<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ServiceFileSpec implements FileSpecInterface
{
    private $namespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $topLevelNamespace . '\Service';
        $this->className = $fileName . 'Service';
        $this->filePath = $baseFilePath . '/src/Service/' . $fileName . 'Service.php';

        $this->associatedFiles = [
            ServiceFunctionalTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryFunctionalTestFileSpec::class,
        ];
    }

    public function getFileContent($template)
    {
        return sprintf(
            $template,
            $this->namespace,
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }

    public function getAssociatedFiles()
    {
        return $this->associatedFiles;
    }

    public function getClassName()
    {
        return $this->className;
    }
}