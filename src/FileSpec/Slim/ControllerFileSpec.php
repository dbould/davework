<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class ControllerFileSpec implements FileSpecInterface
{
    private $namespace;
    private $className;
    private $filePath;
    private $associatedFiles;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName, $requestedType)
    {
        $this->namespace = $topLevelNamespace . '\Controller';
        $this->className = $fileName;
        $this->filePath = $baseFilePath . '/src/Controller/' . $fileName . '.php';

        $this->associatedFiles = [
            ControllerTestFileSpec::class,
            FactoryFileSpec::class,
            FactoryTestFileSpec::class,
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
            $this->className);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
