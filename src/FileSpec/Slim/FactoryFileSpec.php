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

    public function __construct($topLevelNamespace, $fileName, $baseFilePath)
    {
        $this->namespace = $topLevelNamespace . '\Factory';
        $this->className = $fileName . 'Factory';
        $this->filePath = $baseFilePath . '/src/Factory/' . $fileName . 'Factory.php';

        $this->associatedFiles = [
            FactoryFunctionalTestFileSpec::class
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
            $this->fileName);
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
