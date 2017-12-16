<?php
namespace Davework\FileSpec\Slim;

use Davework\FileSpec\FileSpecInterface;

class FactoryFileSpec implements FileSpecInterface
{
    private $namespace;
    private $fileName;
    private $className;
    private $associatedFiles;
    private $filePath;
    private $classToReturn;

    public function __construct($topLevelNamespace, $fileName, $baseFilePath, $requestedName, $requestedType)
    {
        $this->namespace = $topLevelNamespace . '\Factory';
        $this->className = $fileName;
        $this->filePath = $baseFilePath . '/src/Factory/' . $fileName . '.php';
        $this->classToReturn = str_replace('Factory', '', $fileName);

        $this->associatedFiles = [
            FactoryTestFileSpec::class
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
            $this->className,
            $this->classToReturn);
    }

    public function getFilePath()
    {
        return $this->filePath;
    }
}
