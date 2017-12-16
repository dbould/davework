<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ServiceFileSpec implements FileSpecInterface
{
    private $namespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName, $requestedType)
    {
        $this->namespace = $topLevelNamespace . '\Service';
        $this->className = $fileName;
        $this->filePath = $baseFilePath . '/src/Service/' . $fileName . '.php';

        $this->associatedFiles = [
            ServiceTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryTestFileSpec::class,
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
}
